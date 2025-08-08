<?php foreach (([ 'tableName','isTailwind','isBootstrap','isBootstrap4','isBootstrap5', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div <?php echo e($attributes->merge([

    'wire:loading.class' => $this->displayFilterPillsWhileLoading ? '' : 'invisible',
    'x-cloak',
])
->class([
    'mb-4 px-4 md:p-0' => $isTailwind,
    'mb-3' => $isBootstrap,
])); ?>>
    <small class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'text-gray-700 dark:text-white' => $isTailwind,
        '' =>  $isBootstrap,
    ]); ?>">
        <?php echo e(__($localisationPath.'Applied Filters')); ?>:
    </small>
    <?php foreach ($this->getPillDataForFilter() as $filterKey => $filterPillData): ?>

        <!--[if BLOCK]><![endif]--><?php if($filterPillData->hasCustomPillBlade): ?>
            <?php echo $__env->make($filterPillData->getCustomPillBlade(), ['filter' => $this->getFilterByKey($filterKey), 'filterPillData' => $filterPillData], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginal2cce0fdf82a4bdfcb439a47d14fea645 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2cce0fdf82a4bdfcb439a47d14fea645 = $attributes; } ?>
<?php $component = Rappasoft\LaravelLivewireTables\View\Components\FilterPill::resolve(['filterKey' => $filterKey,'filterPillData' => $filterPillData] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::filter-pill'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Rappasoft\LaravelLivewireTables\View\Components\FilterPill::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2cce0fdf82a4bdfcb439a47d14fea645)): ?>
<?php $attributes = $__attributesOriginal2cce0fdf82a4bdfcb439a47d14fea645; ?>
<?php unset($__attributesOriginal2cce0fdf82a4bdfcb439a47d14fea645); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2cce0fdf82a4bdfcb439a47d14fea645)): ?>
<?php $component = $__componentOriginal2cce0fdf82a4bdfcb439a47d14fea645; ?>
<?php unset($__componentOriginal2cce0fdf82a4bdfcb439a47d14fea645); ?>
<?php endif; ?>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php endforeach; ?>

    <?php if (isset($component)) { $__componentOriginalf2ac2127214bfbd55fce482c4884d1da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf2ac2127214bfbd55fce482c4884d1da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.filter-pills.buttons.reset-all','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.filter-pills.buttons.reset-all'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf2ac2127214bfbd55fce482c4884d1da)): ?>
<?php $attributes = $__attributesOriginalf2ac2127214bfbd55fce482c4884d1da; ?>
<?php unset($__attributesOriginalf2ac2127214bfbd55fce482c4884d1da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf2ac2127214bfbd55fce482c4884d1da)): ?>
<?php $component = $__componentOriginalf2ac2127214bfbd55fce482c4884d1da; ?>
<?php unset($__componentOriginalf2ac2127214bfbd55fce482c4884d1da); ?>
<?php endif; ?>
</div><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/tools/filter-pills.blade.php ENDPATH**/ ?>