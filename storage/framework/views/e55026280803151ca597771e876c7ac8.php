<?php foreach (([ 'tableName', 'isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([]));

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

foreach (array_filter(([]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div x-cloak x-show="filtersOpen" <?php echo e($attributes
            ->merge($this->getFilterSlidedownWrapperAttributes)
            ->merge($isTailwind ? [
                'x-transition:enter' => 'transition ease-out duration-100',
                'x-transition:enter-start' => 'transform opacity-0',
                'x-transition:enter-end' => 'transform opacity-100',
                'x-transition:leave' => 'transition ease-in duration-75',
                'x-transition:leave-start' => 'transform opacity-100',
                'x-transition:leave-end' => 'transform opacity-0',
            ] : [])
            ->class([
                'container' => $isBootstrap && ($this->getFilterSlidedownWrapperAttributes['default'] ?? true),
            ])
            ->except(['default','default-colors','default-styling'])); ?> 

>
    <?php $__currentLoopData = $this->getFiltersByRow(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filterRowIndex => $filtersInRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($defaultAttributes = $this->getFilterSlidedownRowAttributes($filterRowIndex)); ?>
        <div <?php echo e($attributes
            ->merge($defaultAttributes)
            ->merge([
                'row' => $filterRowIndex,
            ])
            ->class([
                'row col-12' => $isBootstrap && ($defaultAttributes['default-styling'] ?? true),
                'grid grid-cols-12 gap-6 px-4 py-2 mb-2' => $isTailwind && ($defaultAttributes['default-styling'] ?? true),
            ])
            ->except(['default','default-colors','default-styling'])); ?> 
        >
            <?php $__currentLoopData = $filtersInRow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'space-y-1 mb-4' =>
                            $isBootstrap,
                        'col-12 col-sm-9 col-md-6 col-lg-3' =>
                            $isBootstrap &&
                            !$filter->hasFilterSlidedownColspan(),
                        'col-12 col-sm-6 col-md-6 col-lg-3' =>
                            $isBootstrap &&
                            $filter->hasFilterSlidedownColspan() &&
                            $filter->getFilterSlidedownColspan() === 2,
                        'col-12 col-sm-3 col-md-3 col-lg-3' =>
                            $isBootstrap &&
                            $filter->hasFilterSlidedownColspan() &&
                            $filter->getFilterSlidedownColspan() === 3,
                        'col-12 col-sm-1 col-md-1 col-lg-1' =>
                            $isBootstrap &&
                            $filter->hasFilterSlidedownColspan() &&
                            $filter->getFilterSlidedownColspan() === 4,
                        'space-y-1 col-span-12' =>
                            $isTailwind,
                        'sm:col-span-6 md:col-span-4 lg:col-span-2' =>
                            $isTailwind &&
                            !$filter->hasFilterSlidedownColspan(),
                        'sm:col-span-12 md:col-span-8 lg:col-span-4' =>
                            $isTailwind &&
                            $filter->hasFilterSlidedownColspan() &&
                            $filter->getFilterSlidedownColspan() === 2,
                        'sm:col-span-9 md:col-span-4 lg:col-span-3' =>
                            $isTailwind &&
                            $filter->hasFilterSlidedownColspan() &&
                            $filter->getFilterSlidedownColspan() === 3,
                    ]); ?>"
                    id="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>-wrapper"
                >
                    <?php echo e($filter->setGenericDisplayData($this->getFilterGenericData)->render()); ?>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\toolbar\items\filter-slidedown.blade.php ENDPATH**/ ?>