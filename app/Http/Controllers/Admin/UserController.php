<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Registration;
use App\Models\AreaOfExpertise;
use App\Models\SubAreaOfExpertise;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


public function create()
{
    $areas = AreaOfExpertise::all();
    $subAreas = SubAreaOfExpertise::all();

    return view('admin.users.create', compact('areas', 'subAreas'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        // User info
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:8',

        // Registration info
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'cnic' => ['required', 'regex:/^\d{5}-\d{7}-\d{1}$/'],
        'dob' => 'required|date|before:today',
        'age' => 'required|integer|min:0|max:120',
        'city' => 'required|string|max:255',
        'notice_period' => 'required|string|max:50',
        'area_of_expertise_id' => 'required|string',
        'other_expertise' => 'nullable|required_if:area_of_expertise_id,Other|string|max:255',
        'sub_area_of_expertise_id' => 'required|string|max:255',
        'cv_file' => 'required|file|mimes:pdf,doc,docx|max:2048',

    ]);

    
    // Check if the email already has a registration
    if (Registration::where('email', $validated['email'])->exists()) {
        return redirect()->back()->withErrors(['email' => 'This email already has a registration.']);
    }

    // Create user
    $user = User::create([
        'full_name' => $validated['full_name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);



    // Determine final expertise
    $expertise = $validated['area_of_expertise_id'] === 'Other'
        ? $validated['other_expertise']
        : $validated['area_of_expertise_id'];

    // Store CV file
    $cvPath = $request->file('cv_file')->store('cvs', 'public');
    
    // Create registration
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
        'user_id' => $user->id,
    ]);

    return redirect()->route('admin.users.create')->with('success', 'User and Registration created successfully.');
}

}
