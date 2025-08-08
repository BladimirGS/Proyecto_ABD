<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['value']));

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

foreach (array_filter((['value']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<td <?php echo e($attributes->merge(['class' => 'px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400'])); ?>>
    <div class="max-w-72 break-words whitespace-normal">
        <span><?php echo e($value ?? $slot); ?></span>
    </div>
    
</td><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/components/table-cell.blade.php ENDPATH**/ ?>