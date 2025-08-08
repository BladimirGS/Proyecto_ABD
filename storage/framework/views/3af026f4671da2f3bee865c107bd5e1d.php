<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('usuarios.index')): ?>
            <a href="<?php echo e(route('usuarios.index')); ?>" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/usuario.svg')); ?>" alt="Usuario" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Usuarios</span>
            </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('actividades.index')): ?>
            <a href="<?php echo e(route('actividades.index')); ?>" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/actividad.svg')); ?>" alt="Actividad" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Actividades</span>
            </a>
        <?php endif; ?>
    
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('grupos.index')): ?>
            <a href="<?php echo e(route('grupos.index')); ?>" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/grupo.svg')); ?>" alt="Grupo" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Grupos</span>
            </a>
        <?php endif; ?>
    
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('archivos.index')): ?>
            <a href="<?php echo e(route('archivos.index')); ?> " class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/archivo.svg')); ?>" alt="Archivo" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Archivos</span>
            </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reportes.index')): ?>
            <a href="<?php echo e(route('reportes.index')); ?>" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/reporte.svg')); ?>" alt="Reporte" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Reportes</span>
            </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('docentes.index')): ?>
            <a href="<?php echo e(route('docentes.index')); ?>" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="<?php echo e(asset('svg/tablero.svg')); ?>" alt="Reporte" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Tablero</span>
            </a>
        <?php endif; ?>
    </div>

<?php $__env->startPush('scripts'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if(session('status')): ?>
            Livewire.dispatch('exito');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\admin\index.blade.php ENDPATH**/ ?>