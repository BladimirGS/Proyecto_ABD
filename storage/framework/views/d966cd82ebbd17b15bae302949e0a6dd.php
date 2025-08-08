<a href="<?php echo e($path); ?>" <?php echo count($attributes) ? $column->arrayToAttributes($attributes) : ''; ?>>
    <?php if($column->isHtml()): ?>
        <?php echo $title; ?>

    <?php else: ?>
        <?php echo e($title); ?>

    <?php endif; ?>
</a>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\includes\columns\link.blade.php ENDPATH**/ ?>