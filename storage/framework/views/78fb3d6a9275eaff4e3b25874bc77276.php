<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['color' => 'default']));

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

foreach (array_filter((['color' => 'default']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $class = '';

    switch ($color) {
        case 'green':
            $class = 'bg-green-600 hover:bg-green-700 focus:bg-green-500 active:bg-green-800';
            break;
        case 'blue':
            $class = 'bg-blue-600 hover:bg-blue-700 focus:bg-blue-500 active:bg-blue-800';
            break;
        case 'amber':
            $class = 'bg-amber-500 hover:bg-amber-600 focus:bg-amber-500 active:bg-amber-700';
            break;
        case 'red':
            $class = 'bg-red-600 hover:bg-red-700 focus:bg-red-500 active:bg-red-800';
            break;
        default:
            $class = 'bg-[#1e355e] hover:bg-[#1a2e52] focus:bg-[#17294a] active:bg-[#14233f]';
            break;
    }
?>

<button <?php echo e($attributes->merge(['class' => trim('px-4 py-2 text-center text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-200 ' . $class)])); ?>>
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/components/button.blade.php ENDPATH**/ ?>