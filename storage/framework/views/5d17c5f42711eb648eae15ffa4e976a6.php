<?php foreach ((['tableName','isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['colCount' => 1]));

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

foreach (array_filter((['colCount' => 1]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $loaderRow = $this->getLoadingPlaceHolderRowAttributes();
    $loaderCell = $this->getLoadingPlaceHolderCellAttributes();
    $loaderIcon = $this->getLoadingPlaceHolderIconAttributes();
?>

<tr wire:key="<?php echo e($tableName); ?>-loader" wire:loading.class.remove="hidden d-none" <?php echo e($attributes->merge($loaderRow)
        ->class([
            'hidden w-full text-center place-items-center align-middle' => $isTailwind && ($loaderRow['default'] ?? true),
            'd-none w-100 text-center align-items-center' => $isBootstrap && ($loaderRow['default'] ?? true),
        ])
        ->except(['default','default-styling','default-colors'])); ?>>
    <td colspan="<?php echo e($colCount); ?>" wire:key="<?php echo e($tableName); ?>-loader-column" <?php echo e($attributes->merge($loaderCell)
            ->class([
                'py-4' => $isTailwind && ($loaderCell['default'] ?? true),
                'py-4' => $isBootstrap && ($loaderCell['default'] ?? true),
            ])
            ->except(['default','default-styling','default-colors', 'colspan','wire:key'])); ?>>
        <?php if($this->hasLoadingPlaceholderBlade()): ?>
            <?php echo $__env->make($this->getLoadingPlaceHolderBlade(), ['colCount' => $colCount], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <div class="h-min self-center align-middle text-center">
                <div class="lds-hourglass"<?php echo e($attributes->merge($loaderIcon)
                            ->class([
                                'lds-hourglass' => $isTailwind && ($loaderIcon['default'] ?? true),
                                'lds-hourglass' => $isBootstrap && ($loaderIcon['default'] ?? true),
                            ])
                            ->except(['default','default-styling','default-colors'])); ?>></div>
                <div><?php echo $this->getLoadingPlaceholderContent(); ?></div>
            </div>
        <?php endif; ?>
    </td>
</tr>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\includes\loading.blade.php ENDPATH**/ ?>