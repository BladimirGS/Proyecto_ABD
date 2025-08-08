<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active']));

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

foreach (array_filter((['active']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$classes = ($active ?? false)
    ? 'w-full flex items-center p-3 text-indigo-600 font-semibold hover:bg-white hover:shadow-md rounded-lg
    transition-all duration-200'
    : 'w-full flex items-center p-3 text-gray-700 hover:text-indigo-600 hover:bg-white hover:shadow-md rounded-lg
    transition-all duration-200';
?>

<li class="relative">
    <a <?php echo e($attributes->merge(['class' => $classes])); ?>>
        <?php echo e($slot); ?>

    </a>
</li><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/components/nav-link.blade.php ENDPATH**/ ?>