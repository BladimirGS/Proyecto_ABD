<div>
    <div class="md:flex md:justify-center p-5 bg-white rounded-lg shadow">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3">
            ✖
        </button>

        <form class="md:w-full lg:w-3/4" wire:submit.prevent="actualizarGrupos">
            <?php echo csrf_field(); ?>

            <h2 class="block font-bold text-lg text-gray-700 text-center mb-4">Asignar Grupos</h2>

            <!-- Selección de Periodo -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Seleccionar Periodo</label>
                <select 
                    wire:model="periodoSeleccionado" 
                    wire:change="actualizarPeriodo" 
                    class="w-full border-gray-300 rounded mt-2">
                    <option value="">Seleccione un periodo</option>
                    <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($periodo->id); ?>"><?php echo e($periodo->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>            
                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('periodoSeleccionado'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('periodoSeleccionado')),'class' => 'mt-2']); ?>
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
            </div>

            <!-- Grupos Asignados -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">
                    Grupos Asignados (<?php echo e(count($gruposAsignados)); ?>)
                </label>
                
                <div class="overflow-y-auto max-h-60 border p-3 rounded">
                    <?php $__empty_1 = true; $__currentLoopData = $gruposAsignados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-center justify-between py-1">
                            <label class="text-gray-700">
                                <input type="checkbox" value="<?php echo e($grupo['id']); ?>" wire:model="gruposUsuario" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <?php echo e($grupo['clave']); ?> - <?php echo e($grupo->materia->nombre ?? 'Sin materia'); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-500 text-sm">No hay grupos asignados.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Buscador -->
            <div class="mb-4">
                <input type="text" 
                    wire:model="busqueda" 
                    wire:input="actualizarListas" 
                    placeholder="Buscar grupo..." 
                    class="w-full border-gray-300 rounded px-3 py-2">
            </div>


            <!-- Grupos Disponibles -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">
                    Grupos Disponibles (<?php echo e(count($gruposDisponibles)); ?>)
                </label>

                <div class="overflow-y-auto max-h-60 border p-3 rounded">
                    <?php $__empty_1 = true; $__currentLoopData = $gruposDisponibles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-center justify-between py-1">
                            <label class="text-gray-700">
                                <input type="checkbox" value="<?php echo e($grupo['id']); ?>" wire:model="gruposUsuario" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                <?php echo e($grupo['clave']); ?> - <?php echo e($grupo->materia['nombre'] ?? 'Sin materia'); ?>

                            </label>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-500 text-sm">No hay grupos disponibles.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['wire:click' => '$dispatch(\'closeModal\')','type' => 'button','color' => 'red','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$dispatch(\'closeModal\')','type' => 'button','color' => 'red','class' => 'w-full md:w-auto']); ?>
                    Cancelar
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
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
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full md:w-auto']); ?>
                    Asignar Grupos
                 <?php echo $__env->renderComponent(); ?>
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
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\livewire\grupo\asignar-grupos.blade.php ENDPATH**/ ?>