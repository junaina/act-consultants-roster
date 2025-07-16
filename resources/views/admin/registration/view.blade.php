@extends('layouts.app') @section('content')
<div class="max-w-3xl mx-auto py-10">
    <h2 class="text-2xl font-semibold mb-6">Registration Details</h2>

    <div class="space-y-4">
        <p><strong>Full Name:</strong> {{ $registration->user->full_name }}</p>
        <p><strong>Email:</strong> {{ $registration->user->email }}</p>
        <p><strong>First Name:</strong> {{ $registration->first_name }}</p>
        <p><strong>Last Name:</strong> {{ $registration->last_name }}</p>
        <p><strong>CNIC:</strong> {{ $registration->cnic }}</p>
        <p><strong>Date of Birth:</strong> {{ $registration->dob }}</p>
        <p><strong>Age:</strong> {{ $registration->age }}</p>
        <p><strong>City:</strong> {{ $registration->city }}</p>
        <p>
            <strong>Notice Period:</strong> {{ $registration->notice_period }}
        </p>
        <p>
            <strong>Area of Expertise:</strong>
            {{ $registration->area_of_expertise_id }}
        </p>
        <p>
            <strong>Sub-Area of Expertise:</strong>
            {{ $registration->sub_area_of_expertise_id }}
        </p>
        <p>
            <strong>CV:</strong>
            @if ($registration->cv_path)
            <a
                href="{{ asset('storage/' . $registration->cv_path) }}"
                target="_blank"
                class="text-blue-600 underline"
                >View CV</a
            >
            @else Not uploaded @endif
        </p>
    </div>

    <div class="mt-6">
        <a
            href="{{ route('admin.users.dashboard') }}"
            class="text-blue-500 hover:underline"
            >&larr; Back to Dashboard</a
        >
    </div>
</div>
@endsection
