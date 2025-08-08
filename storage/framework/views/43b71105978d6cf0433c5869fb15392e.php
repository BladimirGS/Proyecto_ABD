<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <link rel="icon" type="image/svg" href="<?php echo e(asset('svg/tecito.svg')); ?>">

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

        <?php echo $__env->yieldPushContent('styles'); ?>
    </head>
    <body>
        <div class="min-h-screen bg-gray-100 flex flex-col">
            <?php echo $__env->make('layouts.header-guest', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page Content -->
            <main class="flex-grow flex items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
                <div class="w-full max-w-md space-y-8">
                    <?php echo e($slot); ?>

                </div>
            </main>

            <?php echo $__env->make('layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/layouts/guest.blade.php ENDPATH**/ ?>