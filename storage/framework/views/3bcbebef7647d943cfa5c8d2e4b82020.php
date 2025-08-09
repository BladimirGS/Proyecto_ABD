<?php foreach ((['isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<!--[if BLOCK]><![endif]--><?php if($this->collapsingColumnsAreEnabled && $this->hasCollapsedColumns): ?>
    <th scope="col" :class="{ 'laravel-livewire-tables-reorderingMinimised': ! currentlyReorderingStatus }" <?php echo e($attributes->merge()
            ->class([
                'table-cell dark:bg-gray-800 laravel-livewire-tables-reorderingMinimised' => $isTailwind,
                'sm:hidden' => $isTailwind && !$this->shouldCollapseOnTablet && !$this->shouldCollapseAlways,
                'md:hidden' => $isTailwind && !$this->shouldCollapseOnMobile && !$this->shouldCollapseOnTablet && !$this->shouldCollapseAlways,
                'lg:hidden' => $isTailwind && !$this->shouldCollapseAlways,
                'd-table-cell laravel-livewire-tables-reorderingMinimised' => $isBootstrap,
                'd-sm-none' => $isBootstrap && !$this->shouldCollapseOnTablet && !$this->shouldCollapseAlways,
                'd-md-none' => $isBootstrap && !$this->shouldCollapseOnMobile && !$this->shouldCollapseOnTablet && !$this->shouldCollapseAlways,
                'd-lg-none' => $isBootstrap && !$this->shouldCollapseAlways,
            ])); ?>></th>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/table/th/collapsed-columns.blade.php ENDPATH**/ ?>