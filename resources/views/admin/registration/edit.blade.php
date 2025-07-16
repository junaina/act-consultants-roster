@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Registration</h2>

        <form action="{{ route('admin.users.registrations.update', $registration->id) }}" method="POST"
            enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow space-y-8">
            @csrf
            @method('PUT')

            <!-- User Account Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">User Account</h3>

                <div class="space-y-4">
                    <div>
                        <label for="full_name" class="block font-medium">Full Name</label>
                        <input type="text" name="full_name" id="full_name"
                            value="{{ old('full_name', $registration->user->full_name) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="email" class="block font-medium">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', $registration->user->email) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>
            </div>

            <!-- Registration Profile Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Registration Profile</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="block font-medium">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                            value="{{ old('first_name', $registration->first_name) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="last_name" class="block font-medium">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                            value="{{ old('last_name', $registration->last_name) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="cnic" class="block font-medium">CNIC</label>
                        <input type="text" name="cnic" id="cnic" value="{{ old('cnic', $registration->cnic) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="dob" class="block font-medium">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="{{ old('dob', $registration->dob) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="age" class="block font-medium">Age</label>
                        <input type="number" name="age" id="age" value="{{ old('age', $registration->age) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="city" class="block font-medium">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $registration->city) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="notice_period" class="block font-medium">Notice Period</label>
                        <input type="text" name="notice_period" id="notice_period"
                            value="{{ old('notice_period', $registration->notice_period) }}"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="area_of_expertise_id" class="block font-medium">Area of Expertise</label>
                        <select name="area_of_expertise_id" id="area_of_expertise_id"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}"
                                    {{ $registration->area_of_expertise_id == $area->id ? 'selected' : '' }}>
                                    {{ $area->name }}
                                </option>
                            @endforeach
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="sub_area_of_expertise_id" class="block font-medium">Sub-Area of Expertise</label>
                        <select name="sub_area_of_expertise_id" id="sub_area_of_expertise_id"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            @foreach ($subAreas as $sub)
                                <option value="{{ $sub->id }}"
                                    {{ $registration->sub_area_of_expertise_id == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- CV Upload -->

                <div class="mt-6">
                    @if ($registration->cv_path)
                        <strong class="text-sm mt-2">
                            Current: <a href="{{ asset('storage/' . $registration->cv_path) }}" target="_blank"
                                class="text-blue-600 underline">View CV</a>
                        </strong>
                    @endif
                    <label for="cv_file" class="block font-medium mb-1">Upload CV</label>
                    <input type="file" name="cv_file" class="block">

                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 transition">
                    Update Registration
                </button>
            </div>
        </form>
    </div>
@endsection
