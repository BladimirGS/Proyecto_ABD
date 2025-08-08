<?php foreach ((['tableName','primaryKey', 'isTailwind', 'isBootstrap', 'isBootstrap4', 'isBootstrap5']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['checkboxAttributes']));

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

foreach (array_filter((['checkboxAttributes']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<input x-cloak
    <?php echo e($attributes->merge($checkboxAttributes)->class([
            'border-gray-300 text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600' => ($isTailwind) && ($checkboxAttributes['default-colors'] ?? ($checkboxAttributes['default'] ?? true)),
            'rounded shadow-sm transition duration-150 ease-in-out focus:ring focus:ring-opacity-50' => ($isTailwind) && ($checkboxAttributes['default-styling'] ?? ($checkboxAttributes['default'] ?? true)),
            'form-check-input' => ($isBootstrap5) && ($checkboxAttributes['default'] ?? true),
        ])->except(['default','default-styling','default-colors'])); ?>

/><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/forms/checkbox.blade.php ENDPATH**/ ?>