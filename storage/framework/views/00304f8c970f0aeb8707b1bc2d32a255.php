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
    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 bg-white shadow-sm sm:rounded-lg mx-auto">
            <h1 class="text-2xl font-bold text-center my-5 py-10">Mis Notificaciones</h1>

            <div class="bg-white px-10 pb-10">
                <h2 class="text-xl font-bold">Notificaciones no leídas</h2>
                <?php $__empty_1 = true; $__currentLoopData = $notificacionesNoLeidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="p-5 border border-gray-200 sm:flex sm:justify-between sm:items-center">
                        <div>
                            <p>Revisión en:</p>
                            <p>Grupo:
                                <span class="font-bold"><?php echo e($notificacion->data['clave_grupo']); ?></span>
                            </p>
                            <p>
                                <span class="font-bold"><?php echo e($notificacion->created_at->diffForHumans()); ?></span>
                            </p>
                        </div>
                        <div class="mt-5 lg:mt-0">
                            <a href="<?php echo e(route('docente.grupo.actividades.show', [
                                'grupo' => $notificacion->data['id_grupo'],
                                'actividad' => $notificacion->data['id_actividad']
                            ])); ?>" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                Ver revisión
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No tienes notificaciones no leídas.</p>
                <?php endif; ?>

                
                <div class="mt-4">
                    <?php echo e($notificacionesNoLeidas->links()); ?>

                </div>

                <h2 class="text-xl font-bold mt-10">Notificaciones leídas</h2>
                <?php $__empty_1 = true; $__currentLoopData = $notificacionesLeidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notificacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="p-5 border border-gray-200 sm:flex sm:justify-between sm:items-center">
                        <div>
                            <p>Revisión en:</p>
                            <p>Grupo:
                                <span class="font-bold"><?php echo e($notificacion->data['clave_grupo']); ?></span>
                            </p>
                            <p>
                                <span class="font-bold"><?php echo e($notificacion->created_at->diffForHumans()); ?></span>
                            </p>
                        </div>
                        <div class="mt-5 lg:mt-0">
                            <a href="<?php echo e(route('docente.grupo.actividades.show', [
                                'grupo' => $notificacion->data['id_grupo'],
                                'actividad' => $notificacion->data['id_actividad']
                            ])); ?>" class="bg-gray-500 p-3 text-sm uppercase font-bold text-white rounded-lg">
                                Ver revisión
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p>No tienes notificaciones leídas.</p>
                <?php endif; ?>

                
                <div class="mt-4">
                    <?php echo e($notificacionesLeidas->links()); ?>

                </div>
            </div>
        </div>            
    </div>
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
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\notificaciones\index.blade.php ENDPATH**/ ?>