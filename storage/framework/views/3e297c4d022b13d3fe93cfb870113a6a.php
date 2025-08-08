<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['component', 'tableName', 'primaryKey', 'isTailwind', 'isBootstrap','isBootstrap4', 'isBootstrap5']));

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

foreach (array_filter((['component', 'tableName', 'primaryKey', 'isTailwind', 'isBootstrap','isBootstrap4', 'isBootstrap5']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<div wire:key="<?php echo e($tableName); ?>-wrapper" >
    <div <?php echo e($attributes->merge($this->getComponentWrapperAttributes())); ?>

        <?php if($this->hasRefresh()): ?> wire:poll<?php echo e($this->getRefreshOptions()); ?> <?php endif; ?>
        <?php if($this->isFilterLayoutSlideDown()): ?> wire:ignore.self <?php endif; ?>>

        <div>
        <?php if($this->debugIsEnabled()): ?>
            <?php echo $__env->make('livewire-tables::includes.debug', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
        <?php if($this->offlineIndicatorIsEnabled()): ?>
            <?php echo $__env->make('livewire-tables::includes.offline', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

            <?php echo e($slot); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\wrapper.blade.php ENDPATH**/ ?>