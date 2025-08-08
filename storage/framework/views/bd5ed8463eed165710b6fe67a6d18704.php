<?php foreach ((['isTailwind','isBootstrap','isBootstrap4', 'isBootstrap5', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['currentRows']));

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

foreach (array_filter((['currentRows']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>
<?php echo $__env->renderWhen(
    $this->hasConfigurableAreaFor('before-pagination'), 
    $this->getConfigurableAreaFor('before-pagination'), 
    $this->getParametersForConfigurableArea('before-pagination')
, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

<div <?php echo e($this->getPaginationWrapperAttributesBag()); ?>>
    <?php if($this->paginationVisibilityIsEnabled()): ?>
        <?php if($isTailwind): ?>
            <div class="mt-4 px-4 md:p-0 sm:flex justify-between items-center space-y-4 sm:space-y-0">
                <div>
                    <?php if($this->paginationIsEnabled && $this->isPaginationMethod('standard') && $currentRows->lastPage() > 1 && $this->showPaginationDetails): ?>
                        <p class="paged-pagination-results text-sm text-gray-700 leading-5 dark:text-white">
                                <span><?php echo e(__($localisationPath.'Showing')); ?></span>
                                <span class="font-medium"><?php echo e($currentRows->firstItem()); ?></span>
                                <span><?php echo e(__($localisationPath.'to')); ?></span>
                                <span class="font-medium"><?php echo e($currentRows->lastItem()); ?></span>
                                <span><?php echo e(__($localisationPath.'of')); ?></span>
                                <span class="font-medium"><span x-text="paginationTotalItemCount"></span></span>
                                <span><?php echo e(__($localisationPath.'results')); ?></span>
                        </p>
                    <?php elseif($this->paginationIsEnabled && $this->isPaginationMethod('simple') && $this->showPaginationDetails): ?>
                        <p class="paged-pagination-results text-sm text-gray-700 leading-5 dark:text-white">
                            <span><?php echo e(__($localisationPath.'Showing')); ?></span>
                            <span class="font-medium"><?php echo e($currentRows->firstItem()); ?></span>
                            <span><?php echo e(__($localisationPath.'to')); ?></span>
                            <span class="font-medium"><?php echo e($currentRows->lastItem()); ?></span>
                        </p>
                    <?php elseif($this->paginationIsEnabled && $this->isPaginationMethod('cursor')): ?>
                    <?php else: ?>
                        <?php if($this->showPaginationDetails): ?>
                            <p class="total-pagination-results text-sm text-gray-700 leading-5 dark:text-white">
                                <span><?php echo e(__($localisationPath.'Showing')); ?></span>
                                <span class="font-medium"><?php echo e($currentRows->count()); ?></span>
                                <span><?php echo e(__($localisationPath.'results')); ?></span>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php if($this->paginationIsEnabled): ?>
                    <?php echo e($currentRows->links('livewire-tables::specific.tailwind.'.(!$this->isPaginationMethod('standard') ? 'simple-' : '').'pagination')); ?>

                <?php endif; ?>
            </div>
        <?php else: ?>
            <?php if($this->paginationIsEnabled && $this->isPaginationMethod('standard') && $currentRows->lastPage() > 1): ?>
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        <?php echo e($currentRows->links('livewire-tables::specific.bootstrap-4.pagination')); ?>

                    </div>

                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        "col-12 col-md-6 text-center text-muted",
                        "text-md-right" => $isBootstrap4,
                        "text-md-end" => $isBootstrap5,
                        ]); ?>">
                        <?php if($this->showPaginationDetails): ?>
                            <span><?php echo e(__($localisationPath.'Showing')); ?></span>
                            <strong><?php echo e($currentRows->count() ? $currentRows->firstItem() : 0); ?></strong>
                            <span><?php echo e(__($localisationPath.'to')); ?></span>
                            <strong><?php echo e($currentRows->count() ? $currentRows->lastItem() : 0); ?></strong>
                            <span><?php echo e(__($localisationPath.'of')); ?></span>
                            <strong><span x-text="paginationTotalItemCount"></span></strong>
                            <span><?php echo e(__($localisationPath.'results')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($this->paginationIsEnabled && $this->isPaginationMethod('simple')): ?>
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        <?php echo e($currentRows->links('livewire-tables::specific.bootstrap-4.simple-pagination')); ?>

                    </div>

                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        "col-12 col-md-6 text-center text-muted",
                        "text-md-right" => $isBootstrap4,
                        "text-md-end" => $isBootstrap5,
                    ]); ?>">
                        <?php if($this->showPaginationDetails): ?>
                            <span><?php echo e(__($localisationPath.'Showing')); ?></span>
                            <strong><?php echo e($currentRows->count() ? $currentRows->firstItem() : 0); ?></strong>
                            <span><?php echo e(__($localisationPath.'to')); ?></span>
                            <strong><?php echo e($currentRows->count() ? $currentRows->lastItem() : 0); ?></strong>
                        <?php endif; ?>
                    </div>
                </div>
            <?php elseif($this->paginationIsEnabled && $this->isPaginationMethod('cursor')): ?>
                <div class="row mt-3">
                    <div class="col-12 col-md-6 overflow-auto">
                        <?php echo e($currentRows->links('livewire-tables::specific.bootstrap-4.simple-pagination')); ?>

                    </div>
                </div>
            <?php else: ?>
                <div class="row mt-3">
                    <div class="col-12 text-muted">
                        <?php if($this->showPaginationDetails): ?>
                            <?php echo e(__($localisationPath.'Showing')); ?>

                            <strong><?php echo e($currentRows->count()); ?></strong>
                            <?php echo e(__($localisationPath.'results')); ?>

                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php echo $__env->renderWhen(
    $this->hasConfigurableAreaFor('after-pagination'), 
    $this->getConfigurableAreaFor('after-pagination'), 
    $this->getParametersForConfigurableArea('after-pagination')
, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\pagination.blade.php ENDPATH**/ ?>