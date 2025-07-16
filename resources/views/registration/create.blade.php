@extends('layouts.app')

@section('content')
    {{-- Error Log --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-red-600 to-blue-400 max-w-6xl mx-auto py-10 px-4 text-white text-center shadow">
        <h1 class="text-3xl sm:text-4xl font-bold mb-2">Expert Consultant Portal</h1>
        <p class="text-lg">Join our network of professionals making a difference in communities worldwide</p>
    </div>
    {{-- Form Section --}}
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="bg-white rounded shadow-lg border">
            <div class="bg-red-100 text-black p-4 rounded-t">
                <h2 class="text-xl font-semibold">Profile Management</h2>
            </div>

            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Please complete your profile information below</h3>

                <form method="POST"
                    action="{{ isset($existing) ? route('registration.update', $existing->id) : route('registration.store') }}"
                    class="space-y-6" enctype="multipart/form-data">
                    @csrf
                    @if (isset($existing))
                        @method('PUT')
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- First Name --}}
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="John" value="{{ old('first_name', $existing->first_name ?? '') }}" required>
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="Doe" value="{{ old('last_name', $existing->last_name ?? '') }}" required>
                        </div>

                        {{-- CNIC --}}
                        <div>
                            <label for="cnic" class="block text-sm font-medium text-gray-700 mb-1">CNIC Number</label>
                            <input type="text" id="cnic" name="cnic"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="xxxxx-xxxxxxx-x" value="{{ old('cnic', $existing->cnic ?? '') }}" required>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="you@example.com" value="{{ old('email', $existing->email ?? '') }}" required>
                        </div>

                        {{-- DOB --}}
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" id="dob" name="dob"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                value="{{ old('dob', $existing->dob ?? '') }}" required>
                        </div>

                        {{-- Age --}}
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                            <input type="number" id="age" name="age"
                                value="{{ old('age', $existing->age ?? '') }}"
                                class="w-full border-b border-gray-300 bg-gray-100 text-gray-900 py-2" readonly
                                placeholder="Calculated automatically">
                        </div>

                        {{-- City --}}
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Current City</label>
                            <input type="text" id="city" name="city"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="e.g., Karachi" value="{{ old('city', $existing->city ?? '') }}" required>
                        </div>

                        {{-- Notice Period --}}
                        <div>
                            <label for="notice_period" class="block text-sm font-medium text-gray-700 mb-1">Notice
                                Period</label>
                            <select id="notice_period" name="notice_period"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    {{ old('notice_period', $existing->notice_period ?? '') == '' ? 'selected' : '' }}>
                                    Select Notice Period</option>
                                <option value="Immediate"
                                    {{ old('notice_period', $existing->notice_period ?? '') == 'Immediate' ? 'selected' : '' }}>
                                    Immediate</option>
                                <option value="1 week"
                                    {{ old('notice_period', $existing->notice_period ?? '') == '1 week' ? 'selected' : '' }}>
                                    1 week</option>
                                <option value="2 weeks"
                                    {{ old('notice_period', $existing->notice_period ?? '') == '2 weeks' ? 'selected' : '' }}>
                                    2 weeks</option>
                                <option value="1 month"
                                    {{ old('notice_period', $existing->notice_period ?? '') == '1 month' ? 'selected' : '' }}>
                                    1 month</option>
                            </select>
                        </div>

                        {{-- Area of Expertise --}}
                        <div>
                            <label for="area_of_expertise_id" class="block text-sm font-medium text-gray-700 mb-1">Area of
                                Expertise</label>
                            <select id="area_of_expertise_id" name="area_of_expertise_id"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    {{ old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == '' ? 'selected' : '' }}>
                                    Select Area
                                </option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" data-name="{{ $area->name }}"
                                        {{ old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == $area->id ? 'selected' : '' }}>
                                        {{ $area->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sub Area --}}
                        <div id="sub_area_of_expertise">
                            <label for="sub_area_of_expertise_id" class="block text-sm font-medium text-gray-700 mb-1">Sub
                                Area</label>
                            <select id="sub_area_of_expertise_id" name="sub_area_of_expertise_id"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    {{ old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '') == '' ? 'selected' : '' }}>
                                    Select Sub Area
                                </option>
                                @foreach ($subAreas as $sub)
                                    <option value="{{ $sub->id }}" data-parent="{{ $sub->area_of_expertise_id }}"
                                        {{ old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '') == $sub->id ? 'selected' : '' }}>
                                        {{ $sub->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Other Expertise --}}
                        <div id="other_expertise_container"
                            class="{{ old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == 'other' ? '' : 'hidden' }}">
                            <label for="other_expertise" class="block text-sm font-medium text-gray-700 mb-1">Please
                                Specify</label>
                            <input type="text" id="other_expertise" name="other_expertise"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2"
                                placeholder="Enter your area of expertise"
                                value="{{ old('other_expertise', $existing->other_expertise ?? '') }}">
                        </div>

                        {{-- CV --}}
                        <div class="md:col-span-2">
                            @if (isset($existing) && $existing->cv_path)
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current CV</label>
                                <a href="{{ asset('storage/' . $existing->cv_path) }}" target="_blank"
                                    class="text-blue-600 underline">View Uploaded CV</a>
                            @endif

                            <label for="cv_file" class="block text-sm font-medium text-gray-700 mt-2">Upload CV</label>
                            <input type="file" id="cv_file" name="cv_file"
                                class="w-full border-b border-gray-300 text-gray-900 py-2" accept=".pdf,.doc,.docx"
                                {{ isset($existing) ? '' : 'required' }}>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700 mt-6">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--script to calculate age from date of birth-->
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const areaSelect = document.getElementById('area_of_expertise_id');
            const subAreaSelect = document.getElementById('sub_area_of_expertise_id');
            const otherExpertiseContainer = document.getElementById('other_expertise_container');
            const allSubOptions = Array.from(subAreaSelect.options).slice(1); // Exclude placeholder

            const selectedAreaId = '{{ old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') }}';
            const selectedSubId =
                '{{ old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '') }}';

            // Sub-Area Loader Function
            function updateSubAreas(areaId) {
                subAreaSelect.innerHTML = '<option value="" disabled>Select Sub Area</option>';

                allSubOptions.forEach(option => {
                    if (option.dataset.parent === areaId) {
                        subAreaSelect.appendChild(option);
                    }
                });

                if (selectedSubId) {
                    subAreaSelect.value = selectedSubId;
                }
            }

            // Preload sub-areas if editing
            if (selectedAreaId) {
                updateSubAreas(selectedAreaId);
            }

            // Area change event
            areaSelect.addEventListener('change', function() {
                const selectedId = this.value;
                const selectedName = this.options[this.selectedIndex].dataset.name;

                updateSubAreas(selectedId);

                // Toggle "Other" input
                if (selectedName === 'Other') {
                    otherExpertiseContainer.classList.remove('hidden');
                } else {
                    otherExpertiseContainer.classList.add('hidden');
                    document.getElementById('other_expertise').value = '';
                }

                // Hide/show sub-area based on 'Other'
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

            // Age calculation from DOB
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

</body>

</html>
