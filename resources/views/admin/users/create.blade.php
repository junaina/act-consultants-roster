@extends('layouts.app')

@section('content')

    <div class="max-w-6xl mx-auto  px-4">
        <div class="bg-white rounded shadow-lg border">
            <div class="bg-red-100 text-black p-4 rounded-t">
                <h2 class="text-xl font-semibold">Create a New User and Registration</h2>
            </div>
            {{-- Form Section --}}
            <div class="max-w-6xl mx-auto py-10 px-4">

                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6 bg-white p-6 rounded shadow">
                    @csrf

                    <h3 class="text-xl font-semibold">User Account</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-medium">Full Name</label>
                            <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>
                    </div>

                    <hr class="my-6">
                    <h3 class="text-xl font-semibold">Registration Profile</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="first_name" class="block text-sm font-medium">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="cnic" class="block text-sm font-medium">CNIC</label>
                            <input type="text" id="cnic" name="cnic" placeholder="xxxxx-xxxxxxx-x"
                                value="{{ old('cnic') }}" required class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                            <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="age" class="block text-sm font-medium">Age</label>
                            <input type="number" id="age" name="age" value="{{ old('age') }}" readonly
                                class="w-full bg-gray-100 border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city') }}" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div>
                            <label for="notice_period" class="block text-sm font-medium">Notice Period</label>
                            <select id="notice_period" name="notice_period" required
                                class="w-full border border-gray-300 p-2 rounded">
                                <option disabled selected value="">Select</option>
                                <option value="Immediate">Immediate</option>
                                <option value="1 week">1 week</option>
                                <option value="2 weeks">2 weeks</option>
                                <option value="1 month">1 month</option>
                            </select>
                        </div>

                        <div>
                            <label for="area_of_expertise_id" class="block text-sm font-medium">Area of Expertise</label>
                            <select id="area_of_expertise_id" name="area_of_expertise_id"
                                class="w-full border border-gray-300 p-2 rounded" required>
                                <option value="" disabled selected>Select Area</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" data-name="{{ $area->name }}">
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="other_expertise_container" class="hidden">
                            <label for="other_expertise" class="block text-sm font-medium">Please Specify</label>
                            <input type="text" id="other_expertise" name="other_expertise"
                                value="{{ old('other_expertise') }}" class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div id="sub_area_of_expertise">
                            <label for="sub_area_of_expertise_id" class="block text-sm font-medium">Sub-Area of
                                Expertise</label>
                            <select id="sub_area_of_expertise_id" name="sub_area_of_expertise_id"
                                class="w-full border border-gray-300 p-2 rounded" required>
                                <option value="" disabled selected>Select Sub Area</option>
                                @foreach ($subAreas as $sub)
                                    <option value="{{ $sub->id }}" data-parent="{{ $sub->area_of_expertise_id }}">
                                        {{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="cv_file" class="block text-sm font-medium">Upload CV</label>
                            <input type="file" id="cv_file" name="cv_file" accept=".pdf,.doc,.docx" required
                                class="w-full border border-gray-300 p-2 rounded">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                            Create User + Registration
                        </button>
                    </div>
                </form>
            </div>
        @endsection

        @section('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const areaSelect = document.getElementById('area_of_expertise_id');
                    const subAreaSelect = document.getElementById('sub_area_of_expertise_id');
                    const otherExpertiseContainer = document.getElementById('other_expertise_container');
                    const allSubOptions = Array.from(subAreaSelect.options).slice(1); // Exclude placeholder

                    function updateSubAreas(areaId) {
                        subAreaSelect.innerHTML = '<option value="" disabled>Select Sub Area</option>';
                        allSubOptions.forEach(option => {
                            if (option.dataset.parent === areaId) {
                                subAreaSelect.appendChild(option);
                            }
                        });
                    }

                    areaSelect.addEventListener('change', function() {
                        const selectedId = this.value;
                        const selectedName = this.options[this.selectedIndex].dataset.name;
                        updateSubAreas(selectedId);

                        if (selectedName === 'Other') {
                            otherExpertiseContainer.classList.remove('hidden');
                        } else {
                            otherExpertiseContainer.classList.add('hidden');
                            document.getElementById('other_expertise').value = '';
                        }

                        const subAreaWrapper = document.getElementById('sub_area_of_expertise');
                        if (selectedName === 'Other') {
                            subAreaWrapper.classList.add('hidden');
                            subAreaSelect.value = '';
                        } else {
                            subAreaWrapper.classList.remove('hidden');
                        }
                    });

                    // CNIC formatting
                    document.getElementById('cnic').addEventListener('input', function(e) {
                        let val = e.target.value.replace(/\D/g, '');
                        let formatted = '';
                        if (val.length <= 5) {
                            formatted = val;
                        } else if (val.length <= 12) {
                            formatted = val.slice(0, 5) + '-' + val.slice(5);
                        } else {
                            formatted = val.slice(0, 5) + '-' + val.slice(5, 12) + '-' + val.slice(12, 13);
                        }
                        e.target.value = formatted;
                    });

                    // Age calculation
                    document.getElementById('dob').addEventListener('change', function() {
                        const dob = new Date(this.value);
                        const today = new Date();
                        if (dob > today) {
                            alert('Date of Birth cannot be in the future.');
                            this.value = '';
                            document.getElementById('age').value = '';
                            return;
                        }

                        let age = today.getFullYear() - dob.getFullYear();
                        const m = today.getMonth() - dob.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                            age--;
                        }
                        document.getElementById('age').value = age;
                    });
                });
            </script>
        @endsection
