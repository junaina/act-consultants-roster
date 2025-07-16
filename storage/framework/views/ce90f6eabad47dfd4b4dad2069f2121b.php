

<?php $__env->startSection('content'); ?>
    <div class="w-full max-w-screen-xl px-8 py-10">

        <!-- Page Title -->
        <h2 class="text-3xl font-semibold text-slate-800 mb-6">Assign Roles to Users</h2>

        <!-- Flash Message -->
        <?php if(session('success')): ?>
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

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

            <a href="<?php echo e(route('admin.users.roles.index')); ?>"
                class="px-4 py-2 text-sm bg-emerald-100 text-emerald-700 border border-emerald-200 rounded-lg hover:bg-emerald-200 transition">
                Manage Roles
            </a>
        </div>

        <!-- Role Assignment Table -->
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-red-100 text-xs uppercase text-black-600">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Current Role</th>
                        <th class="px-6 py-3">Assign Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e($user->full_name); ?></td>
                            <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                            <td class="px-6 py-4"><?php echo e($user->role->name ?? 'None'); ?></td>
                            <td class="px-6 py-4">
                                <form method="POST" action="<?php echo e(route('admin.users.roles.assignment.store')); ?>"
                                    class="flex items-center gap-3">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                                    <select name="role_id"
                                        class="border border-gray-300 rounded-md px-3 py-1.5 text-sm shadow-sm focus:ring-1 focus:ring-rose-400">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($role->id); ?>"
                                                <?php echo e($user->role_id == $role->id ? 'selected' : ''); ?>>
                                                <?php echo e($role->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <button type="submit"
                                        class="px-4 py-1.5 text-sm text-white bg-rose-500 hover:bg-rose-600 rounded-md transition">
                                        Assign
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            <?php echo e($users->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/users/assign.blade.php ENDPATH**/ ?>