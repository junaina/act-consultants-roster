

<?php $__env->startSection('content'); ?>
    <div class="max-w-screen-xl mx-auto px-8 py-6">
        <h1 class="text-3xl font-semibold text-slate-800 mb-6">Manage Areas of Expertise</h1>

        <!-- Navigation Buttons -->
        <div class="flex flex-wrap gap-3 mb-6">
            <?php if(Route::is('admin.users.areas.index')): ?>
                <a href="<?php echo e(route('admin.users.dashboard')); ?>"
                    class="px-4 py-2 text-sm rounded-lg bg-slate-100 text-slate-700 border border-slate-300 hover:bg-slate-200 transition">
                    ← Back to Dashboard
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('admin.users.areas.index')); ?>"
                    class="px-4 py-2 text-sm rounded-lg bg-blue-100 text-blue-700 border border-blue-200 hover:bg-blue-200 transition">
                    Manage Areas of Expertise
                </a>
            <?php endif; ?>

            <a href="<?php echo e(route('admin.users.sub-areas.index')); ?>"
                class="px-4 py-2 text-sm rounded-lg bg-purple-100 text-purple-700 border border-purple-200 hover:bg-purple-200 transition">
                Manage Sub Areas
            </a>

            <a href="<?php echo e(route('admin.users.roles.index')); ?>"
                class="px-4 py-2 text-sm rounded-lg bg-emerald-100 text-emerald-700 border border-emerald-200 hover:bg-emerald-200 transition">
                Manage Roles
            </a>

            <a href="<?php echo e(route('admin.users.roles.assignment.index')); ?>"
                class="px-4 py-2 text-sm rounded-lg bg-orange-100 text-orange-700 border border-orange-200 hover:bg-orange-200 transition">
                Assign Roles
            </a>
        </div>

        <!-- Add New Area Button -->
        <div class="mb-4">
            <a href="<?php echo e(route('admin.users.areas.create')); ?>"
                class="inline-block text-sm bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">
                + Add New Area
            </a>
        </div>

        <!-- Areas Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-center text-gray-700">
                <thead class="bg-red-200 text-xs uppercase text-black-600">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 ">
                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                <?php echo e($area->name); ?>

                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center flex-wrap gap-2">

                                    <a href="<?php echo e(route('admin.users.areas.edit', $area->id)); ?>"
                                        class="px-3 py-1 text-sm rounded-md bg-yellow-100 text-yellow-800 hover:bg-yellow-200 transition">
                                        Edit
                                    </a>

                                    <form action="<?php echo e(route('admin.users.areas.destroy', $area->id)); ?>" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this area?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="px-3 py-1 text-sm rounded-md bg-rose-100 text-rose-700 hover:bg-rose-200 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>

                                <?php if(session('delete_error_id') == $area->id): ?>
                                    <p class="text-sm text-red-600 mt-2">
                                        <?php echo e(session('error')); ?>

                                    </p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/admin/areas/index.blade.php ENDPATH**/ ?>