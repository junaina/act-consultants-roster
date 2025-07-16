

<?php $__env->startSection('content'); ?>
    <div class="max-w-xl mx-auto mt-8">
        <h2 class="text-xl font-semibold mb-4">Create New Sub Area</h2>
        <form action="<?php echo e(route('admin.users.sub-areas.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="area_of_expertise_id" class="block font-medium mb-1">Parent Area</label>
                <select name="area_of_expertise_id" id="area_of_expertise_id" class="w-full border rounded px-4 py-2">
                    <option value="">Select Area</option>
                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($area->id); ?>"
                            <?php echo e(old('area_of_expertise_id', $selectedAreaId) == $area->id ? 'selected' : ''); ?>>
                            <?php echo e($area->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['area_of_expertise_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-4">
                <label for="name" class="block font-medium mb-1">Sub Area Name</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                    class="w-full border rounded px-4 py-2" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                    Save Sub Area
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/sub-areas/create.blade.php ENDPATH**/ ?>