<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\AreaOfExpertise;
use App\Models\SubAreaOfExpertise;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = AreaOfExpertise::all();
        $subAreas = SubAreaOfExpertise::all();

        $oldInput = session()->get('registration_data', []);


        return view('registration.create', compact('areas', 'subAreas', 'oldInput'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $registration = Registration::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        //validation
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cnic' => ['required', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'email' => 'required|email|unique:registrations,email,' . $registration->id,
            'dob' => 'required|date|before:today',
            'age' => 'required|integer|min:0|max:120',
            'city' => 'required|string|max:255',
            'notice_period' => 'required|string|max:50',
            'area_of_expertise_id' => 'required|string',
            'other_expertise' => 'nullable|string|max:255',
            'sub_area_of_expertise_id' => 'required|string|max:255',
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:2048',


        ]);
        //determining the expertise val to save
        $expertise = $validated['area_of_expertise_id'] === 'Other' ?
            $validated['other_expertise'] :
            $validated['area_of_expertise_id'];

        //storing the file
        $cvPath = $request->file('cv_file')->store('cvs', 'public');

        $user = Auth::user();
        if ($user && $user->role === 'admin') {
            // this was submitted by an admin
            $userId = null; // Admins do not have a user ID in this context
        } else {
            // this was submitted by a user
            $userId = $user->id; // Get the authenticated
        }

        //creating the registration
        Registration::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'cnic' => $validated['cnic'],
            'email' => $validated['email'],
            'dob' => $validated['dob'],
            'age' => $validated['age'],
            'city' => $validated['city'],
            'notice_period' => $validated['notice_period'],
            'area_of_expertise_id' => $expertise,
            'sub_area_of_expertise_id' => $validated['sub_area_of_expertise_id'],
            'cv_path' => $cvPath,
            'user_id' => $userId, // Store the user ID if available

        ]);
        return redirect()->route('registrations.edit')->with('success', 'Registration updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function createOrEdit()
    {
        $areas = AreaOfExpertise::all();
        $subAreas = SubAreaOfExpertise::all();

        $existing = null;

        if (Auth::check()) {
            $existing = Registration::where('user_id', Auth::id())->first();
        }

        return view('registration.create', compact('areas', 'subAreas', 'existing'));
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $registration = Registration::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Determine if CV is already present
        $cvRule = $registration->cv_path ? 'nullable' : 'required';

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'cnic' => ['required', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
            'email' => 'required|email|unique:registrations,email,' . $registration->id,
            'dob' => 'required|date|before:today',
            'age' => 'required|integer|min:0|max:120',
            'city' => 'required|string|max:255',
            'notice_period' => 'required|string|max:50',
            'area_of_expertise_id' => 'required|string',
            'other_expertise' => 'nullable|string|max:255',
            'sub_area_of_expertise_id' => 'required|string|max:255',
            'cv_file' => $cvRule . '|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle CV upload only if a new file is provided
        if ($request->hasFile('cv_file')) {
            $cvPath = $request->file('cv_file')->store('cvs', 'public');
        } else {
            $cvPath = $registration->cv_path; // Keep existing
        }

        $registration->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'cnic' => $validated['cnic'],
            'email' => $validated['email'],
            'dob' => $validated['dob'],
            'age' => $validated['age'],
            'city' => $validated['city'],
            'notice_period' => $validated['notice_period'],
            'area_of_expertise_id' =>
            $validated['area_of_expertise_id'] === 'Other'
                ? $validated['other_expertise']
                : $validated['area_of_expertise_id'],
            'sub_area_of_expertise_id' => $validated['sub_area_of_expertise_id'],
            'cv_path' => $cvPath,
        ]);

        return redirect()->route('registrations.edit')->with('success', 'Registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
