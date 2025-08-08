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
        <?php echo e($grupoUser->grupo->clave); ?> - <?php echo e($grupoUser->grupo->materia->nombre ?? "Desconocido"); ?>

    </h1>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <div class="bg-white shadow-sm sm:rounded-lg py-10 px-8 md:px-20 mx-auto">
                <div class="mb-4 space-y-4">
                    <h1 class="text-2xl font-bold"><?php echo e($actividad->nombre); ?></h1>

                    <p class="text-base text-gray-600 font-medium whitespace-pre-line break-normal"><?php echo e($actividad->descripcion); ?></p>

                    <h2 class="text-lg font-bold">Fecha programada:
                        <?php if (isset($component)) { $__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.formato-fecha','data' => ['fechaformateada' => ''.e($actividad->fecha).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('formato-fecha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fechaformateada' => ''.e($actividad->fecha).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d)): ?>
<?php $attributes = $__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d; ?>
<?php unset($__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d)): ?>
<?php $component = $__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d; ?>
<?php unset($__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d); ?>
<?php endif; ?>
                    </span></h2>
                </div>
        
                <!-- Tabla con información de la actividad -->
                <div class="mb-8 overflow-x-auto">
                    <table class="w-full table-auto border border-collapse border-gray-400 mx-auto">
                        <tbody>
                            <tr>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?>Estatus de la entrega <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold']); ?>
                                    <?php if($archivo): ?>
                                        Actividad completada
                                    <?php else: ?>
                                        Actividad no completada
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                            </tr>
                            <tr>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?>Estatus de revisión <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold']); ?>
                                    <?php if($archivo): ?>
                                        <?php echo e($archivo->estado); ?>

                                    <?php else: ?>
                                        Actividad no completada
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>                                
                            </tr>
                            <tr>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?>Última modificación <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold']); ?>
                                    <?php echo e($archivo ? $archivo->fecha : '-'); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                            </tr>
                            <tr>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-bold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-bold']); ?>Archivo <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginale879916077dd6f89968249d7765eac40 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale879916077dd6f89968249d7765eac40 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table-cell','data' => ['class' => 'font-semibold']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('table-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'font-semibold']); ?>
                                    <?php if($archivo): ?>
                                    <?php if (isset($component)) { $__componentOriginal02ab1e95a407f3e68c723dac19892ad0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal02ab1e95a407f3e68c723dac19892ad0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.truncade','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('truncade'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                        <a href="<?php echo e(route('verArchivo', ['archivo' => $archivo->id, 'nombre' => $archivo->nombre])); ?>" target="_blank" class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate  active:text-red-600">
                                            <?php echo e($archivo->nombre); ?>

                                        </a>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal02ab1e95a407f3e68c723dac19892ad0)): ?>
<?php $attributes = $__attributesOriginal02ab1e95a407f3e68c723dac19892ad0; ?>
<?php unset($__attributesOriginal02ab1e95a407f3e68c723dac19892ad0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal02ab1e95a407f3e68c723dac19892ad0)): ?>
<?php $component = $__componentOriginal02ab1e95a407f3e68c723dac19892ad0; ?>
<?php unset($__componentOriginal02ab1e95a407f3e68c723dac19892ad0); ?>
<?php endif; ?>
                                    <?php else: ?>
                                        Actividad no completada
                                    <?php endif; ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $attributes = $__attributesOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__attributesOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale879916077dd6f89968249d7765eac40)): ?>
<?php $component = $__componentOriginale879916077dd6f89968249d7765eac40; ?>
<?php unset($__componentOriginale879916077dd6f89968249d7765eac40); ?>
<?php endif; ?>
                            </tr>
                            
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400 font-semibold" colspan="2">
                                    <form action="<?php echo e(route('archivos.evaluar', ['archivo' => $archivo->id])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <label class="font-bold mb-2">Comentario :</label>

                                        <?php if($comentario): ?>
                                        <?php if (isset($component)) { $__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.formato-fecha','data' => ['fechaformateada' => ''.e($comentario->fecha).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('formato-fecha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['fechaformateada' => ''.e($comentario->fecha).'']); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d)): ?>
<?php $attributes = $__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d; ?>
<?php unset($__attributesOriginalf04b35ea95f5d51a539fab6dcd69f33d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d)): ?>
<?php $component = $__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d; ?>
<?php unset($__componentOriginalf04b35ea95f5d51a539fab6dcd69f33d); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                        
                                        <div class="mb-4">
                                            <?php if($comentario): ?>
                                                <p class="whitespace-pre-line"><?php echo e($comentario->comentario); ?></p>
                                            <?php else: ?>
                                                <p>No hay comentarios</p>
                                            <?php endif; ?>
                                        </div>
                                    
                                        <textarea name="comentario" class="w-full mt-2 border rounded"></textarea>
                                        
                                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('comentario'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('comentario')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                                        <!-- Opciones de Estado -->
                                        <div class="mt-4">
                                            <label class="font-bold">Estado:</label>
                                            <div class="flex items-center space-x-4 mt-2">
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Aprobado" 
                                                        <?php echo e($archivo->estado === 'Aprobado' ? 'checked' : ''); ?> class="mr-2">
                                                    Aprobado
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Rechazado" 
                                                        <?php echo e($archivo->estado === 'Rechazado' ? 'checked' : ''); ?> class="mr-2">
                                                    Rechazado
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Pendiente" 
                                                        <?php echo e($archivo->estado === 'Pendiente' ? 'checked' : ''); ?> class="mr-2">
                                                    Pendiente
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                                            <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(route('firma.index')).'','color' => 'red','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('firma.index')).'','color' => 'red','class' => 'w-full md:w-auto']); ?>
                                                atras
                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>

                                            <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full md:w-auto']); ?>Guardar evaluación <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <form action="<?php echo e(route('docente.grupo.actividades.subir', ['grupoUser' => $grupoUser->id, 'actividad' => $actividad->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dropzone', ['rules' => ['file','extensions:pdf,doc,docx','max:20840'],'multiple' => false]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2670818835-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            
                        <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('archivo'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('archivo')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                            
                        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['class' => 'mt-8','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mt-8','type' => 'submit']); ?>Subir archivo <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                    </form> 
                </div>
            </div>
        </div>
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


<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/jefe/show.blade.php ENDPATH**/ ?>