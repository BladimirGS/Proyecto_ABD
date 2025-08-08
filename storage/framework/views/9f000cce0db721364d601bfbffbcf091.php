<?php foreach ((['isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['displayMinimisedOnReorder' => false, 'hideUntilReorder' => false, 'customAttributes' => ['default' => true]]));

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

foreach (array_filter((['displayMinimisedOnReorder' => false, 'hideUntilReorder' => false, 'customAttributes' => ['default' => true]]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<th x-cloak scope="col" <?php if($hideUntilReorder): ?> :class="!reorderDisplayColumn && 'w-0 p-0 hidden'" <?php endif; ?> <?php echo e($attributes->merge($customAttributes)->class([
            'table-cell px-3 py-2 md:px-6 md:py-3 text-center md:text-left laravel-livewire-tables-reorderingMinimised' => $isTailwind && (($customAttributes['default-styling'] ?? true) || ($customAttributes['default'] ?? true)),
            'bg-gray-50 dark:bg-gray-800' => $isTailwind && (($customAttributes['default-colors'] ?? true) || ($customAttributes['default'] ?? true)),
            'laravel-livewire-tables-reorderingMinimised' => $isBootstrap && (($customAttributes['default-colors'] ?? true) || ($customAttributes['default'] ?? true)),
        ])->except(['default','default-styling','default-colors'])); ?>>
    <?php echo e($slot); ?>

</th>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\th\plain.blade.php ENDPATH**/ ?>