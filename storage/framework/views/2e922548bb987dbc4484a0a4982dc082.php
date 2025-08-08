<?php foreach (([ 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if (isset($component)) { $__componentOriginal5d33d754447d8bc6578e0c6484d601be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d33d754447d8bc6578e0c6484d601be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.plain','data' => ['customAttributes' => $this->getFooterTrAttributes($this->getRows),'wire:key' => ''.e($tableName .'-footer').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getFooterTrAttributes($this->getRows)),'wire:key' => ''.e($tableName .'-footer').'']); ?>
    
    <?php if(!$this->bulkActionsAreEnabled() || !$this->hasBulkActions()): ?>
        <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['xCloak' => true,'xShow' => 'currentlyReorderingStatus','wire:key' => ''.e($tableName . '-footer-bulkactions-1').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'currentlyReorderingStatus','wire:key' => ''.e($tableName . '-footer-bulkactions-1').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $attributes = $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $component = $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
    <?php elseif($this->bulkActionsAreEnabled() && $this->hasBulkActions()): ?>
        <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['wire:key' => ''.e($tableName . '-footer-bulkactions-2').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName . '-footer-bulkactions-2').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $attributes = $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $component = $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
    <?php endif; ?>

    
    <?php if($this->collapsingColumnsAreEnabled() && $this->hasCollapsedColumns()): ?>
        <?php if (isset($component)) { $__componentOriginalcbcbb42cd972a80745673df94b41b917 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbcbb42cd972a80745673df94b41b917 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.collapsed-columns','data' => ['displayMinimisedOnReorder' => true,'rowIndex' => '-1','hidden' => true,'wire:key' => ''.e($tableName.'-footer-collapse').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.collapsed-columns'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true,'rowIndex' => '-1','hidden' => true,'wire:key' => ''.e($tableName.'-footer-collapse').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbcbb42cd972a80745673df94b41b917)): ?>
<?php $attributes = $__attributesOriginalcbcbb42cd972a80745673df94b41b917; ?>
<?php unset($__attributesOriginalcbcbb42cd972a80745673df94b41b917); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbcbb42cd972a80745673df94b41b917)): ?>
<?php $component = $__componentOriginalcbcbb42cd972a80745673df94b41b917; ?>
<?php unset($__componentOriginalcbcbb42cd972a80745673df94b41b917); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php $__currentLoopData = $this->selectedVisibleColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colIndex => $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-footer-shown-'.$colIndex).'','column' => $column,'customAttributes' => $this->getFooterTdAttributes($column, $this->getRows, $colIndex)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-footer-shown-'.$colIndex).'','column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column),'customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getFooterTdAttributes($column, $this->getRows, $colIndex))]); ?>

            <?php if($column->hasFooter() && $column->hasFooterCallback()): ?>
                <?php if($column->footerCallbackIsFilter()): ?>
                    <?php echo e($column->getFooterFilter($column->getFooterCallback(), $this->getFilterGenericData)); ?>

                <?php elseif($column->footerCallbackIsString()): ?>
                    <?php echo e($column->getFooterFilter($this->getFilterByKey($column->getFooterCallback()), $this->getFilterGenericData)); ?>

                <?php else: ?>
                    <?php echo e($column->getNewFooterContents($this->getRows)); ?>

                <?php endif; ?>
            <?php endif; ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $attributes = $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $component = $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d33d754447d8bc6578e0c6484d601be)): ?>
<?php $attributes = $__attributesOriginal5d33d754447d8bc6578e0c6484d601be; ?>
<?php unset($__attributesOriginal5d33d754447d8bc6578e0c6484d601be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d33d754447d8bc6578e0c6484d601be)): ?>
<?php $component = $__componentOriginal5d33d754447d8bc6578e0c6484d601be; ?>
<?php unset($__componentOriginal5d33d754447d8bc6578e0c6484d601be); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\tr\footer.blade.php ENDPATH**/ ?>