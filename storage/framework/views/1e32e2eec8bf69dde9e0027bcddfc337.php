

<?php $__env->startSection('content'); ?>
    
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <div class="bg-gradient-to-r from-red-600 to-blue-400 max-w-6xl mx-auto py-10 px-4 text-white text-center shadow">
        <h1 class="text-3xl sm:text-4xl font-bold mb-2">Expert Consultant Portal</h1>
        <p class="text-lg">Join our network of professionals making a difference in communities worldwide</p>
    </div>
    
    <div class="max-w-6xl mx-auto py-10 px-4">
        <div class="bg-white rounded shadow-lg border">
            <div class="bg-red-100 text-black p-4 rounded-t">
                <h2 class="text-xl font-semibold">Profile Management</h2>
            </div>

            <div class="p-6">
                <h3 class="text-lg font-semibold mb-4">Please complete your profile information below</h3>

                <form method="POST"
                    action="<?php echo e(isset($existing) ? route('registration.update', $existing->id) : route('registration.store')); ?>"
                    class="space-y-6" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($existing)): ?>
                        <?php echo method_field('PUT'); ?>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="John" value="<?php echo e(old('first_name', $existing->first_name ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="Doe" value="<?php echo e(old('last_name', $existing->last_name ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="cnic" class="block text-sm font-medium text-gray-700 mb-1">CNIC Number</label>
                            <input type="text" id="cnic" name="cnic"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="xxxxx-xxxxxxx-x" value="<?php echo e(old('cnic', $existing->cnic ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="you@example.com" value="<?php echo e(old('email', $existing->email ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" id="dob" name="dob"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                value="<?php echo e(old('dob', $existing->dob ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age</label>
                            <input type="number" id="age" name="age"
                                value="<?php echo e(old('age', $existing->age ?? '')); ?>"
                                class="w-full border-b border-gray-300 bg-gray-100 text-gray-900 py-2" readonly
                                placeholder="Calculated automatically">
                        </div>

                        
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Current City</label>
                            <input type="text" id="city" name="city"
                                class="w-full border-b border-gray-300 focus:border-blue-500 focus:outline-none text-gray-900 py-2"
                                placeholder="e.g., Karachi" value="<?php echo e(old('city', $existing->city ?? '')); ?>" required>
                        </div>

                        
                        <div>
                            <label for="notice_period" class="block text-sm font-medium text-gray-700 mb-1">Notice
                                Period</label>
                            <select id="notice_period" name="notice_period"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    <?php echo e(old('notice_period', $existing->notice_period ?? '') == '' ? 'selected' : ''); ?>>
                                    Select Notice Period</option>
                                <option value="Immediate"
                                    <?php echo e(old('notice_period', $existing->notice_period ?? '') == 'Immediate' ? 'selected' : ''); ?>>
                                    Immediate</option>
                                <option value="1 week"
                                    <?php echo e(old('notice_period', $existing->notice_period ?? '') == '1 week' ? 'selected' : ''); ?>>
                                    1 week</option>
                                <option value="2 weeks"
                                    <?php echo e(old('notice_period', $existing->notice_period ?? '') == '2 weeks' ? 'selected' : ''); ?>>
                                    2 weeks</option>
                                <option value="1 month"
                                    <?php echo e(old('notice_period', $existing->notice_period ?? '') == '1 month' ? 'selected' : ''); ?>>
                                    1 month</option>
                            </select>
                        </div>

                        
                        <div>
                            <label for="area_of_expertise_id" class="block text-sm font-medium text-gray-700 mb-1">Area of
                                Expertise</label>
                            <select id="area_of_expertise_id" name="area_of_expertise_id"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    <?php echo e(old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == '' ? 'selected' : ''); ?>>
                                    Select Area
                                </option>
                                <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($area->id); ?>" data-name="<?php echo e($area->name); ?>"
                                        <?php echo e(old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == $area->id ? 'selected' : ''); ?>>
                                        <?php echo e($area->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div id="sub_area_of_expertise">
                            <label for="sub_area_of_expertise_id" class="block text-sm font-medium text-gray-700 mb-1">Sub
                                Area</label>
                            <select id="sub_area_of_expertise_id" name="sub_area_of_expertise_id"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2" required>
                                <option value="" disabled
                                    <?php echo e(old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '') == '' ? 'selected' : ''); ?>>
                                    Select Sub Area
                                </option>
                                <?php $__currentLoopData = $subAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sub->id); ?>" data-parent="<?php echo e($sub->area_of_expertise_id); ?>"
                                        <?php echo e(old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '') == $sub->id ? 'selected' : ''); ?>>
                                        <?php echo e($sub->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        
                        <div id="other_expertise_container"
                            class="<?php echo e(old('area_of_expertise_id', $existing->area_of_expertise_id ?? '') == 'other' ? '' : 'hidden'); ?>">
                            <label for="other_expertise" class="block text-sm font-medium text-gray-700 mb-1">Please
                                Specify</label>
                            <input type="text" id="other_expertise" name="other_expertise"
                                class="w-full border-b border-gray-300 focus:border-blue-500 text-gray-900 py-2"
                                placeholder="Enter your area of expertise"
                                value="<?php echo e(old('other_expertise', $existing->other_expertise ?? '')); ?>">
                        </div>

                        
                        <div class="md:col-span-2">
                            <?php if(isset($existing) && $existing->cv_path): ?>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current CV</label>
                                <a href="<?php echo e(asset('storage/' . $existing->cv_path)); ?>" target="_blank"
                                    class="text-blue-600 underline">View Uploaded CV</a>
                            <?php endif; ?>

                            <label for="cv_file" class="block text-sm font-medium text-gray-700 mt-2">Upload CV</label>
                            <input type="file" id="cv_file" name="cv_file"
                                class="w-full border-b border-gray-300 text-gray-900 py-2" accept=".pdf,.doc,.docx"
                                <?php echo e(isset($existing) ? '' : 'required'); ?>>
                        </div>
                    </div>

                    
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const areaSelect = document.getElementById('area_of_expertise_id');
            const subAreaSelect = document.getElementById('sub_area_of_expertise_id');
            const otherExpertiseContainer = document.getElementById('other_expertise_container');
            const allSubOptions = Array.from(subAreaSelect.options).slice(1); // Exclude placeholder

            const selectedAreaId = '<?php echo e(old('area_of_expertise_id', $existing->area_of_expertise_id ?? '')); ?>';
            const selectedSubId =
                '<?php echo e(old('sub_area_of_expertise_id', $existing->sub_area_of_expertise_id ?? '')); ?>';

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
<?php $__env->stopSection(); ?>

</body>

</html>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/registration/create.blade.php ENDPATH**/ ?>