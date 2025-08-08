<?php foreach (([ 'tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if (isset($component)) { $__componentOriginal5d33d754447d8bc6578e0c6484d601be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d33d754447d8bc6578e0c6484d601be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.plain','data' => ['customAttributes' => $this->getSecondaryHeaderTrAttributes($this->getRows),'wire:key' => ''.e($tableName .'-secondary-header').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getSecondaryHeaderTrAttributes($this->getRows)),'wire:key' => ''.e($tableName .'-secondary-header').'']); ?>
    
    <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['xCloak' => true,'xShow' => 'currentlyReorderingStatus','displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-header-test').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'currentlyReorderingStatus','displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-header-test').'']); ?>
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

    <?php if($this->showBulkActionsSections): ?>
        <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-header-hasBulkActions').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-header-hasBulkActions').'']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.collapsed-columns','data' => ['hidden' => true,'displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'header-collapsed-hide').'','rowIndex' => '-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.collapsed-columns'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['hidden' => true,'displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'header-collapsed-hide').'','rowIndex' => '-1']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['column' => $column,'displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-secondary-header-show-'.$column->getSlug()).'','customAttributes' => $this->getSecondaryHeaderTdAttributes($column, $this->getRows, $colIndex)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column),'displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName .'-secondary-header-show-'.$column->getSlug()).'','customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->getSecondaryHeaderTdAttributes($column, $this->getRows, $colIndex))]); ?>
            <?php if($column->hasSecondaryHeader() && $column->hasSecondaryHeaderCallback()): ?>
                <?php if( $column->secondaryHeaderCallbackIsFilter()): ?>
                    <?php echo e($column->getSecondaryHeaderFilter($column->getSecondaryHeaderCallback(), $this->getFilterGenericData)); ?>    
                <?php elseif($column->secondaryHeaderCallbackIsString()): ?>
                    <?php echo e($column->getSecondaryHeaderFilter($this->getFilterByKey($column->getSecondaryHeaderCallback()), $this->getFilterGenericData)); ?>

                <?php else: ?>
                    <?php echo e($column->getNewSecondaryHeaderContents($this->getRows)); ?>

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
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\tr\secondary-header.blade.php ENDPATH**/ ?>