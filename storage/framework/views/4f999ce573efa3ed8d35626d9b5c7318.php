<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-900">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="">
            <img src="<?php echo e(asset('images/ACT-LOGO.svg')); ?>" alt="Logo" class="h-11">
        </div>

        <div class="space-x-4">
            <a href="<?php echo e(url('/')); ?>" class="text-gray-700 hover:text-red-600">Home</a>

            <?php if(auth()->guard()->check()): ?>
                <?php
                    $hasRegistration = \App\Models\Registration::where('user_id', auth()->id())->exists();
                ?>

                <?php if($hasRegistration): ?>
                    <a href="<?php echo e(route('registrations.edit')); ?>" class="text-gray-700 hover:text-red-600">Edit
                        Registration</a>
                <?php else: ?>
                    <?php if(auth()->user()->role === 'user'): ?>
                        <a href="<?php echo e(route('registrations.edit')); ?>" class="text-gray-700 hover:text-red-600">Registration
                            Form</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="text-gray-700 hover:text-red-600">Registration
                            Form</a>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(auth()->user()?->role?->name === 'Admin'): ?>
                    <a href="<?php echo e(url('/admin')); ?>" class="text-gray-700 hover:text-red-600">Admin Dashboard</a>
                <?php endif; ?>

                <form action="<?php echo e(route('logout')); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-gray-700 hover:text-red-600">Logout</button>
                </form>
            <?php endif; ?>

            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="text-gray-700 hover:text-red-600">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <main class="mx-auto mt-10 p-4">
        <?php echo $__env->yieldContent('welcome-page-content'); ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/layouts/app.blade.php ENDPATH**/ ?>