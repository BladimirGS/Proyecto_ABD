<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['autocomplete' => 'off', 'disabled' => false]));

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

foreach (array_filter((['autocomplete' => 'off', 'disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<textarea 
    autocomplete="<?php echo e($autocomplete); ?>" 
    <?php echo e($disabled ? 'disabled' : ''); ?> 
    <?php echo $attributes->merge(['class' => 'block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']); ?>

><?php echo e($slot); ?></textarea>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\components\text-area.blade.php ENDPATH**/ ?>