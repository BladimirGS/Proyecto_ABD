<?php foreach ((['tableName','isTailwind','isBootstrap4','isBootstrap5']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'filterKey', 
    'filterPillData', 
    'shouldWatch' => ($filterPillData->shouldWatchForEvents() ?? 0),
    'filterPillsItemAttributes' => $filterPillData->getFilterPillsItemAttributes(),
    ]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'filterKey', 
    'filterPillData', 
    'shouldWatch' => ($filterPillData->shouldWatchForEvents() ?? 0),
    'filterPillsItemAttributes' => $filterPillData->getFilterPillsItemAttributes(),
    ]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div x-data="filterPillsHandler(<?php echo \Illuminate\Support\Js::from($filterPillData->getPillSetupData($filterKey,$shouldWatch))->toHtml() ?>)" x-bind="trigger" 
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
    <span x-text="localFilterTitle + ':&nbsp;'"></span>

    <span <?php echo e($filterPillData->getFilterPillDisplayData()); ?>></span>

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
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filter-pills\pills-item.blade.php ENDPATH**/ ?>