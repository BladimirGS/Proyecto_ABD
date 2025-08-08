<?php foreach (([ 'row', 'rowIndex', 'tableName', 'primaryKey','isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['column', 'colIndex']));

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

foreach (array_filter((['column', 'colIndex']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $customAttributes = $this->getTdAttributes($column, $row, $colIndex, $rowIndex)
?>

<td wire:key="<?php echo e($tableName . '-table-td-'.$row->{$primaryKey}.'-'.$column->getSlug()); ?>"
    <?php if($column->isClickable()): ?>
        <?php if($this->getTableRowUrlTarget($row) === 'navigate'): ?> wire:navigate href="<?php echo e($this->getTableRowUrl($row)); ?>"
        <?php else: ?> onclick="window.open('<?php echo e($this->getTableRowUrl($row)); ?>', '<?php echo e($this->getTableRowUrlTarget($row) ?? '_self'); ?>')"
        <?php endif; ?>
    <?php endif; ?>
        <?php echo e($attributes->merge($customAttributes)
                ->class([
                    'px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white' => $isTailwind && ($customAttributes['default'] ?? true),
                    'hidden' =>  $isTailwind && $column && $column->shouldCollapseAlways(),
                    'hidden md:table-cell' => $isTailwind && $column && $column->shouldCollapseOnMobile(),
                    'hidden lg:table-cell' => $isTailwind && $column && $column->shouldCollapseOnTablet(),
                    '' => $isBootstrap && ($customAttributes['default'] ?? true),
                    'd-none' => $isBootstrap && $column && $column->shouldCollapseAlways(),
                    'd-none d-md-table-cell' => $isBootstrap && $column && $column->shouldCollapseOnMobile(),
                    'd-none d-lg-table-cell' => $isBootstrap && $column && $column->shouldCollapseOnTablet(),
                    'laravel-livewire-tables-cursor' => $isBootstrap && $column && $column->isClickable(),
                ])
                ->except(['default','default-styling','default-colors'])); ?>

    >
        <?php echo e($slot); ?>

</td>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\td.blade.php ENDPATH**/ ?>