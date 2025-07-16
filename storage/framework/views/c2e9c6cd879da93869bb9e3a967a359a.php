

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Registration</h2>

        <form action="<?php echo e(route('admin.users.registrations.update', $registration->id)); ?>" method="POST"
            enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow space-y-8">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- User Account Section -->
            <div>
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">User Account</h3>

                <div class="space-y-4">
                    <div>
                        <label for="full_name" class="block font-medium">Full Name</label>
                        <input type="text" name="full_name" id="full_name"
                            value="<?php echo e(old('full_name', $registration->user->full_name)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="email" class="block font-medium">Email</label>
                        <input type="email" name="email" id="email"
                            value="<?php echo e(old('email', $registration->user->email)); ?>"
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
                            value="<?php echo e(old('first_name', $registration->first_name)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="last_name" class="block font-medium">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                            value="<?php echo e(old('last_name', $registration->last_name)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="cnic" class="block font-medium">CNIC</label>
                        <input type="text" name="cnic" id="cnic" value="<?php echo e(old('cnic', $registration->cnic)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="dob" class="block font-medium">Date of Birth</label>
                        <input type="date" name="dob" id="dob" value="<?php echo e(old('dob', $registration->dob)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="age" class="block font-medium">Age</label>
                        <input type="number" name="age" id="age" value="<?php echo e(old('age', $registration->age)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="city" class="block font-medium">City</label>
                        <input type="text" name="city" id="city" value="<?php echo e(old('city', $registration->city)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="notice_period" class="block font-medium">Notice Period</label>
                        <input type="text" name="notice_period" id="notice_period"
                            value="<?php echo e(old('notice_period', $registration->notice_period)); ?>"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div>
                        <label for="area_of_expertise_id" class="block font-medium">Area of Expertise</label>
                        <select name="area_of_expertise_id" id="area_of_expertise_id"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($area->id); ?>"
                                    <?php echo e($registration->area_of_expertise_id == $area->id ? 'selected' : ''); ?>>
                                    <?php echo e($area->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="sub_area_of_expertise_id" class="block font-medium">Sub-Area of Expertise</label>
                        <select name="sub_area_of_expertise_id" id="sub_area_of_expertise_id"
                            class="w-full border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            <?php $__currentLoopData = $subAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub->id); ?>"
                                    <?php echo e($registration->sub_area_of_expertise_id == $sub->id ? 'selected' : ''); ?>>
                                    <?php echo e($sub->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <!-- CV Upload -->

                <div class="mt-6">
                    <?php if($registration->cv_path): ?>
                        <strong class="text-sm mt-2">
                            Current: <a href="<?php echo e(asset('storage/' . $registration->cv_path)); ?>" target="_blank"
                                class="text-blue-600 underline">View CV</a>
                        </strong>
                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/registration/edit.blade.php ENDPATH**/ ?>