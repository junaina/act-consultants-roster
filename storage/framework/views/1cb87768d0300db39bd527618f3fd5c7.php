

<?php $__env->startSection('content'); ?>
    <div class="max-w-xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-semibold mb-6">Add New Area of Expertise</h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.users.areas.store')); ?>" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Area Name</label>
                <input type="text" name="name" id="name" required
                    class="w-full border border-gray-300 p-2 rounded" value="<?php echo e(old('name')); ?>">
            </div>

            <div class="flex justify-between">
                <a href="<?php echo e(route('admin.users.areas.index')); ?>" class="inline-block text-sm text-gray-600 hover:underline">
                    ← Back to Areas
                </a>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Area
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/areas/create.blade.php ENDPATH**/ ?>