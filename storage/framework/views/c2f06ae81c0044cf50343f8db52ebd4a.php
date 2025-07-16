

<?php $__env->startSection('content'); ?>
    <div class="max-w-xl mx-auto py-8">
        <h2 class="text-2xl font-semibold mb-4">Edit Role</h2>

        <form action="<?php echo e(route('admin.users.roles.update', $role->id)); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label for="name" class="block font-medium">Role Name</label>
                <input type="text" name="name" id="name" value="<?php echo e($role->name); ?>"
                    class="w-full border px-4 py-2 rounded" required>
            </div>

            <div class="flex space-x-3">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update
                    Role</button>
                <a href="<?php echo e(route('admin.users.roles.index')); ?>"
                    class="px-4 py-2 border rounded hover:bg-gray-100">Cancel</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>