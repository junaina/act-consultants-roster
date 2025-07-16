

<?php $__env->startSection('content'); ?>
    <div class="max-w-screen-xl mx-auto px-8 py-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Admin Dashboard</h1>

        <!-- Navigation Links -->
        <div class="flex flex-wrap gap-3 mb-8">
            <a href="<?php echo e(route('admin.users.areas.index')); ?>"
                class="px-4 py-2 rounded-lg text-sm bg-slate-100 text-slate-700 border border-slate-300 hover:bg-slate-200 transition">
                Manage Areas of Expertise
            </a>
            <a href="<?php echo e(route('admin.users.sub-areas.index')); ?>"
                class="px-4 py-2 rounded-lg text-sm bg-purple-100 text-purple-700 border border-purple-200 hover:bg-purple-200 transition">
                Manage Sub Areas
            </a>
            <a href="<?php echo e(route('admin.users.roles.index')); ?>"
                class="px-4 py-2 rounded-lg text-sm bg-emerald-100 text-emerald-700 border border-emerald-200 hover:bg-emerald-200 transition">
                Manage Roles
            </a>
            <a href="<?php echo e(route('admin.users.roles.assignment.index')); ?>"
                class="px-4 py-2 rounded-lg text-sm bg-orange-100 text-orange-700 border border-orange-200 hover:bg-orange-200 transition">
                Assign Roles
            </a>
        </div>

        <!-- Users Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-red-200 text-xs uppercase text-black-600">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">CNIC</th>
                        <th class="px-6 py-3">City</th>
                        <th class="px-6 py-3">Notice Period</th>
                        <th class="px-6 py-3">Area of Expertise</th>
                        <th class="px-6 py-3">CV File</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo e($reg->user->full_name); ?></td>
                            <td class="px-6 py-4"><?php echo e($reg->user->email); ?></td>
                            <td class="px-6 py-4"><?php echo e($reg->cnic); ?></td>
                            <td class="px-6 py-4"><?php echo e($reg->city); ?></td>
                            <td class="px-6 py-4"><?php echo e($reg->notice_period); ?></td>
                            <td class="px-6 py-4">
                                <?php echo e(is_numeric($reg->area_of_expertise_id) ? optional($reg->area)->name : $reg->area_of_expertise_id); ?>

                            </td>
                            <td class="px-6 py-4">
                                <a href="<?php echo e(asset('storage/' . $reg->cv_path)); ?>" target="_blank"
                                    class="text-red-600 hover:underline text-sm">View CV</a>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="<?php echo e(route('admin.users.registrations.edit', $reg->id)); ?>"
                                        class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-700 hover:bg-yellow-200">
                                        View & Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.users.registrations.update', $reg->id)); ?>" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="px-3 py-1 text-sm rounded-md bg-rose-100 text-rose-700 hover:bg-rose-200">
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

        <!-- Pagination -->
        <div class="mt-6">
            <?php echo e($registrations->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>