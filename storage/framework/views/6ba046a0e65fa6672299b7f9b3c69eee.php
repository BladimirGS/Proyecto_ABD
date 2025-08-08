<?php foreach ((['tableName','isTailwind','isBootstrap4','isBootstrap5']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div x-data="filterPillsHandler(<?php echo \Illuminate\Support\Js::from($setupData)->toHtml() ?>)" x-bind="trigger" 
    wire:key="<?php echo e($tableName); ?>-filter-pill-<?php echo e($filterKey); ?>" <?php echo e($attributes->merge($filterPillsItemAttributes)
    ->class([
        'inline-flex items-center px-2.5 py-0.5 rounded-full leading-4' => $isTailwind && ($filterPillsItemAttributes['default-styling'] ?? true),
        'text-xs font-medium capitalize' => $isTailwind && ($filterPillsItemAttributes['default-text'] ?? ($filterPillsItemAttributes['default-styling'] ?? true)),
        'bg-indigo-100 text-indigo-800 dark:bg-indigo-200 dark:text-indigo-900' => $isTailwind && ($filterPillsItemAttributes['default-colors'] ?? true),
        'badge badge-pill badge-info d-inline-flex align-items-center' => $isBootstrap4 && ($filterPillsItemAttributes['default-styling'] ?? true),
        'badge rounded-pill bg-info d-inline-flex align-items-center' => $isBootstrap5 && ($filterPillsItemAttributes['default-styling'] ?? true),
    ])
    ->except(['default', 'default-styling', 'default-colors'])); ?>

>
<span <?php echo e($attributes->merge($pillTitleDisplayDataArray)); ?>></span>:&nbsp;
<span <?php echo e($attributes->merge($pillDisplayDataArray)); ?>></span>

<?php if (isset($component)) { $__componentOriginalabf952f2ccbcb200c7374fb9a6f6687c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalabf952f2ccbcb200c7374fb9a6f6687c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.filter-pills.buttons.reset-filter','data' => ['filterKey' => $filterKey,'filterPillData' => $filterPillData]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.filter-pills.buttons.reset-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['filterKey' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterKey),'filterPillData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterPillData)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalabf952f2ccbcb200c7374fb9a6f6687c)): ?>
<?php $attributes = $__attributesOriginalabf952f2ccbcb200c7374fb9a6f6687c; ?>
<?php unset($__attributesOriginalabf952f2ccbcb200c7374fb9a6f6687c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalabf952f2ccbcb200c7374fb9a6f6687c)): ?>
<?php $component = $__componentOriginalabf952f2ccbcb200c7374fb9a6f6687c; ?>
<?php unset($__componentOriginalabf952f2ccbcb200c7374fb9a6f6687c); ?>
<?php endif; ?>

</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/includes/filter-pill.blade.php ENDPATH**/ ?>