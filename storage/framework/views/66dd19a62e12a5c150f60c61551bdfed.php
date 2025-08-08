<?php foreach (([ 'tableName', 'primaryKey','isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['row', 'rowIndex']));

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

foreach (array_filter((['row', 'rowIndex']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($this->collapsingColumnsAreEnabled && $this->hasCollapsedColumns): ?>
    <?php ($customAttributes = $this->getTrAttributes($row, $rowIndex)); ?>
    <tr x-data
        @toggle-row-content.window="($event.detail.tableName === '<?php echo e($tableName); ?>' && $event.detail.row === <?php echo e($rowIndex); ?>) ? $el.classList.toggle('<?php echo e($isBootstrap ? 'd-none' : 'hidden'); ?>') : null"
        <?php echo e($attributes->merge([
                    'wire:loading.class.delay' => 'opacity-50 dark:bg-gray-900 dark:opacity-60',
                    'wire:key' => $tableName.'-row-'.$row->{$primaryKey}.'-collapsed-contents',
                ])
                ->merge($customAttributes)
                ->class([
                    'hidden bg-white dark:bg-gray-700 dark:text-white rappasoft-striped-row' => ($isTailwind && ($customAttributes['default'] ?? true) && $rowIndex % 2 === 0),
                    'hidden bg-gray-50 dark:bg-gray-800 dark:text-white rappasoft-striped-row' => ($isTailwind && ($customAttributes['default'] ?? true) && $rowIndex % 2 !== 0),
                    'd-none bg-light rappasoft-striped-row' => ($isBootstrap && $rowIndex % 2 === 0 && ($customAttributes['default'] ?? true)),
                    'd-none bg-white rappasoft-striped-row' => ($isBootstrap && $rowIndex % 2 !== 0 && ($customAttributes['default'] ?? true)),
                ])
                ->except(['default','default-styling','default-colors'])); ?>

    >
        <td colspan="<?php echo e($this->getColspanCount); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'text-left pt-4 pb-2 px-4' => $isTailwind,
                'text-start pt-3 p-2' => $isBootstrap,
        ]); ?>">
            <div>
                <?php $__currentLoopData = $this->getCollapsedColumnsForContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colIndex => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <p wire:key="<?php echo e($tableName); ?>-row-<?php echo e($row->{$primaryKey}); ?>-collapsed-contents-<?php echo e($colIndex); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'block mb-2' => $isTailwind,
                            'sm:block' => $isTailwind && $column->shouldCollapseAlways(),
                            'sm:block md:hidden' => $isTailwind && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && $column->shouldCollapseOnMobile(),
                            'sm:block lg:hidden' => $isTailwind && !$column->shouldCollapseAlways() && ($column->shouldCollapseOnTablet() || $column->shouldCollapseOnMobile()),

                            'd-block mb-2' => $isBootstrap,
                            'd-sm-none' => $isBootstrap && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && !$column->shouldCollapseOnMobile(),
                            'd-md-none' => $isBootstrap && !$column->shouldCollapseAlways() && !$column->shouldCollapseOnTablet() && $column->shouldCollapseOnMobile(),
                            'd-lg-none' => $isBootstrap && !$column->shouldCollapseAlways() && ($column->shouldCollapseOnTablet() || $column->shouldCollapseOnMobile()),
                    ]); ?>">
                        <strong><?php echo e($column->getTitle()); ?></strong>: 
                        <?php if($column->isHtml()): ?>
                            <?php echo $column->setIndexes($rowIndex, $colIndex)->renderContents($row); ?>

                        <?php else: ?>
                            <?php echo e($column->setIndexes($rowIndex, $colIndex)->renderContents($row)); ?>

                        <?php endif; ?>
                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\collapsed-columns.blade.php ENDPATH**/ ?>