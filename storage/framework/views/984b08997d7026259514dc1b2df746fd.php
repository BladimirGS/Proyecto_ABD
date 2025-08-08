<?php
    $filterKey = $filter->getKey();
?>

<div x-cloak id="<?php echo e($tableName); ?>-dateRangeFilter-<?php echo e($filterKey); ?>" x-data="flatpickrFilter($wire, '<?php echo e($filterKey); ?>', <?php echo \Illuminate\Support\Js::from($filter->getConfigs())->toHtml() ?>, $refs.dateRangeInput, '<?php echo e(App::currentLocale()); ?>')" >
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
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'w-full rounded-md shadow-sm text-left ' => $isTailwind,
            'd-inline-block w-100 mb-3 mb-md-0 input-group' => $isBootstrap,
        ]); ?>"
    >
        <input
            type="text"
            x-ref="dateRangeInput"
            x-on:click="init"
            x-on:change="changedValue($refs.dateRangeInput.value)"
            value="<?php echo e($filter->getDateString(isset($this->appliedFilters[$filterKey]) ? $this->appliedFilters[$filterKey] : '')); ?>"
            wire:key="<?php echo e($filter->generateWireKey($tableName, 'dateRange')); ?>"
            id="<?php echo e($tableName); ?>-filter-dateRange-<?php echo e($filterKey); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'w-full inline-block align-middle transition duration-150 ease-in-out border-gray-300 rounded-md shadow-sm transition duration-150 ease-in-out focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-white dark:border-gray-600' => $isTailwind,
                'd-inline-block w-100 form-control' => $isBootstrap,
            ]); ?>"
            <?php if($filter->hasConfig('placeholder')): ?> placeholder="<?php echo e($filter->getConfig('placeholder')); ?>" <?php endif; ?>
        />
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filters\date-range.blade.php ENDPATH**/ ?>