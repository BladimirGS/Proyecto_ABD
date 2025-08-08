<div x-data x-init="$dispatch('filter-pills-updated', { filterPillValues: <?php echo \Illuminate\Support\Js::from($returnValues)->toHtml() ?>, tableComponent: <?php echo \Illuminate\Support\Js::from($tableComponent)->toHtml() ?> })"
    >
    <?php echo e($slot); ?>

</div><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\external\filters\livewire-array-filter.blade.php ENDPATH**/ ?>