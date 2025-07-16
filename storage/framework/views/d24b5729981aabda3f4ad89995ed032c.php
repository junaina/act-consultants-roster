

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-screen-xl px-8 py-10">
        <!-- Flash Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Title -->
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-slate-800">Manage Roles</h1>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap gap-3 mb-8">
            <a href="<?php echo e(route('admin.users.dashboard')); ?>"
                class="px-4 py-2 text-sm bg-slate-100 text-slate-700 border border-slate-300 rounded-lg hover:bg-slate-200 transition">
                ← Back to Dashboard
            </a>

            <a href="<?php echo e(route('admin.users.areas.index')); ?>"
                class="px-4 py-2 text-sm bg-blue-100 text-blue-700 border border-blue-200 rounded-lg hover:bg-blue-200 transition">
                Manage Areas of Expertise
            </a>

            <a href="<?php echo e(route('admin.users.sub-areas.index')); ?>"
                class="px-4 py-2 text-sm bg-purple-100 text-purple-700 border border-purple-200 rounded-lg hover:bg-purple-200 transition">
                Manage Sub Areas of Expertise
            </a>

            <a href="<?php echo e(route('admin.users.roles.assignment.index')); ?>"
                class="px-4 py-2 text-sm bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg hover:bg-emerald-200 transition">
                Assign Roles
            </a>
        </div>

        <!-- Add Role Form -->
        <div class="bg-white p-6 rounded-lg shadow mb-10">
            <h2 class="text-xl font-semibold mb-4 text-slate-700">Add New Role</h2>
            <form action="<?php echo e(route('admin.users.roles.store')); ?>" method="POST" class="flex flex-col sm:flex-row gap-4">
                <?php echo csrf_field(); ?>
                <input type="text" name="name" placeholder="Role name"
                    class="flex-grow border border-gray-300 px-4 py-2 rounded-md text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
                <button type="submit"
                    class="bg-red-600 text-white text-sm px-5 py-2 rounded-md hover:bg-red-700 transition">
                    Add Role
                </button>
            </form>
        </div>

        <!-- Roles Table -->
        <h2 class="text-xl font-semibold mb-4 text-slate-700">Actions</h2>
        <div class="bg-white shadow rounded-md overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-red-100 text-xs uppercase text-black-600">
                    <tr>
                        <th class="px-6 py-3">Role Name</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e($role->name); ?></td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2">
                                    <a href="<?php echo e(route('admin.users.roles.edit', $role->id)); ?>"
                                        class="px-4 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-md hover:bg-yellow-200 transition">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.users.roles.destroy', $role->id)); ?>" method="POST"
                                        onsubmit="return confirm('Delete this role?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="px-4 py-1 text-sm bg-rose-100 text-rose-700 rounded-md hover:bg-rose-200 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>