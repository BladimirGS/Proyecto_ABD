<div>
    <?php if (isset($component)) { $__componentOriginal3d520986b3faee512e1fc7aea1837396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d520986b3faee512e1fc7aea1837396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.filter-label','data' => ['filter' => $filter,'filterLayout' => $filterLayout,'tableName' => $tableName,'isTailwind' => $isTailwind,'isBootstrap4' => $isBootstrap4,'isBootstrap5' => $isBootstrap5,'isBootstrap' => $isBootstrap]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.filter-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filter' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filter),'filterLayout' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterLayout),'tableName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName),'isTailwind' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isTailwind),'isBootstrap4' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap4),'isBootstrap5' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap5),'isBootstrap' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d520986b3faee512e1fc7aea1837396)): ?>
<?php $attributes = $__attributesOriginal3d520986b3faee512e1fc7aea1837396; ?>
<?php unset($__attributesOriginal3d520986b3faee512e1fc7aea1837396); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d520986b3faee512e1fc7aea1837396)): ?>
<?php $component = $__componentOriginal3d520986b3faee512e1fc7aea1837396; ?>
<?php unset($__componentOriginal3d520986b3faee512e1fc7aea1837396); ?>
<?php endif; ?>

    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'rounded-md shadow-sm' => $isTailwind,
        'mb-3 mb-md-0 input-group' => $isBootstrap,
    ]); ?>">
        <input <?php echo $filter->getWireMethod('filterComponents.'.$filter->getKey()); ?> <?php echo e($filterInputAttributes->merge() 
                ->class([
                    'block w-full rounded-md shadow-sm transition duration-150 ease-in-out focus:ring focus:ring-opacity-50' => $isTailwind && ($filterInputAttributes['default-styling'] ?? true),
                    'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 dark:bg-gray-800 dark:text-white dark:border-gray-600' => $isTailwind && ($filterInputAttributes['default-colors'] ?? true),
                    'form-control' => $isBootstrap,
                ])
                ->except(['default-styling','default-colors'])); ?> />
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filters\number.blade.php ENDPATH**/ ?>