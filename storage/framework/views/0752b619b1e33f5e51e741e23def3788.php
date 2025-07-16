<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto mt-12 bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

    <?php if(session('status')): ?>
        <div class="mb-4 text-sm text-green-600">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
        <?php echo csrf_field(); ?>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-sm text-red-600 mt-1"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-red-500 focus:border-red-500">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-sm text-red-600 mt-1"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="flex items-center justify-between">
            

        </div>

        <div>
            <button type="submit"
                class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">Log in</button>
        </div>

        <div class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="<?php echo e(route('register')); ?>" class="text-red-600 hover:underline">Sign up here</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\internships\act-projects\registration-form\registration-form\resources\views/auth/login.blade.php ENDPATH**/ ?>