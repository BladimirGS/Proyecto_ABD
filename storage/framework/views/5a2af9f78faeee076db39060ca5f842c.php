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
    <h1 class="font-bold text-2xl text-center uppercase">
        Tablero
    </h1>
    
    <div class="py-8">
        <?php $__empty_1 = true; $__currentLoopData = $gruposPorCarrera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrera => $gruposCarrera): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Carrera de <?php echo e($carrera); ?></h2>
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                <?php $__currentLoopData = $gruposCarrera; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupoUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('docente.grupo.actividades.index', $grupoUser->id)); ?>">
                        <div class="rounded-lg p-6 shadow-md mb-4" style="background-color: <?php echo e($grupoUser->grupo->color ?? '#000000'); ?>">
                            <h2 class="text-white text-xl font-bold">
                                <?php echo e($grupoUser->grupo->clave); ?> - <?php echo e($grupoUser->grupo->materia->nombre ?? "Desconocido"); ?>

                            </h2>
                            <h2 class="text-white text-xl font-bold">
                                Actividades completadas: <?php echo e($actividadesCompletadas[$grupoUser->grupo_id] ?? 0); ?>

                            </h2>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <h2 class="text-2xl font-bold">No hay grupos registrados</h2>
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
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/docente/index.blade.php ENDPATH**/ ?>