<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\User;
use App\Models\AreaOfExpertise;
use App\Models\SubAreaOfExpertise;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegistrationEditController extends Controller
{
    public function edit($id)
    {
        $registration = Registration::with('user')->findOrFail($id);
        $areas = AreaOfExpertise::all();
        $subAreas = SubAreaOfExpertise::all();

        return view('admin.registration.edit', compact('registration', 'areas', 'subAreas'));
    }

    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);
        $user = $registration->user;

        $validated = $request->validate([
            // User info
            'full_name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",

            // Registration info
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cnic' => ['required', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'dob' => 'required|date|before:today',
            'age' => 'required|integer|min:0|max:120',
            'city' => 'required|string|max:255',
            'notice_period' => 'required|string|max:50',
            'area_of_expertise_id' => 'required|string',
            'other_expertise' => 'nullable|string|max:255',
            'sub_area_of_expertise_id' => 'required|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update User
        $user->update([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
        ]);

        // Determine expertise
        $expertise = $validated['area_of_expertise_id'] === 'Other'
            ? $validated['other_expertise']
            : $validated['area_of_expertise_id'];

        // Update CV if uploaded
        if ($request->hasFile('cv_file')) {
            if ($registration->cv_path) {
                Storage::disk('public')->delete($registration->cv_path);
            }
            $cvPath = $request->file('cv_file')->store('cvs', 'public');
        } else {
            $cvPath = $registration->cv_path;
        }

        // Update Registration
        $registration->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'cnic' => $validated['cnic'],
            'dob' => $validated['dob'],
            'age' => $validated['age'],
            'city' => $validated['city'],
            'notice_period' => $validated['notice_period'],
            'area_of_expertise_id' => $expertise,
            'sub_area_of_expertise_id' => $validated['sub_area_of_expertise_id'],
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('admin.users.dashboard')->with('success', 'Registration updated successfully.');
    }

    public function show($id)
    {
        $registration = Registration::with('user')->findOrFail($id);
        return view('admin.registration.view', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);

        if ($registration->cv_path) {
            Storage::disk('public')->delete($registration->cv_path);
        }

        $registration->delete();
        return redirect()->route('admin.users.dashboard')->with('success', 'Registration deleted successfully.');
    }
}
