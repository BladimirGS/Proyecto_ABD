<?php foreach (([ 'tableName', 'isTailwind', 'isBootstrap', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php if($this->bulkActionsAreEnabled() && $this->hasBulkActions()): ?>
    <?php
        $colspan = $this->getColspanCount();
        $selectAll = $this->selectAllIsEnabled();
        $simplePagination = $this->isPaginationMethod('simple');
    ?>

    <?php if (isset($component)) { $__componentOriginal5d33d754447d8bc6578e0c6484d601be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d33d754447d8bc6578e0c6484d601be = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.plain','data' => ['xCloak' => true,'xShow' => 'selectedItems.length > 0 && !currentlyReorderingStatus','wire:key' => ''.e($tableName).'-bulk-select-message','class' => \Illuminate\Support\Arr::toCssClasses([
            'bg-indigo-50 dark:bg-gray-900 dark:text-white' => $isTailwind,
        ])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'selectedItems.length > 0 && !currentlyReorderingStatus','wire:key' => ''.e($tableName).'-bulk-select-message','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
            'bg-indigo-50 dark:bg-gray-900 dark:text-white' => $isTailwind,
        ]))]); ?>
        <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['colspan' => $colspan]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colspan)]); ?>
            <template x-if="selectedItems.length == paginationTotalItemCount || selectAllStatus">
                <div wire:key="<?php echo e($tableName); ?>-all-selected">
                    <span>
                        <?php echo e(__($localisationPath.'You are currently selecting all')); ?>

                        <?php if(!$simplePagination): ?> <strong><span x-text="paginationTotalItemCount"></span></strong> <?php endif; ?>
                        <?php echo e(__($localisationPath.'rows')); ?>.
                    </span>

                    <button
                        x-on:click="clearSelected"
                        wire:loading.attr="disabled"
                        type="button"
                        <?php echo e($this->getBulkActionsRowButtonAttributesBag->class([
                                'ml-1 underline text-sm leading-5 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true),
                                'text-blue-600 text-gray-700 focus:text-gray-800 dark:text-white dark:hover:text-gray-400' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-colors'] ?? true),
                                'btn btn-primary btn-sm' => $isBootstrap && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true)
                            ])); ?>

                    >
                        <?php echo e(__($localisationPath.'Deselect All')); ?>

                    </button>
                </div>
            </template>

            <template x-if="selectedItems.length !== paginationTotalItemCount && !selectAllStatus">
                <div wire:key="<?php echo e($tableName); ?>-some-selected">
                    <span>
                        <?php echo e(__($localisationPath.'You have selected')); ?>

                        <strong><span x-text="selectedItems.length"></span></strong>
                        <?php echo e(__($localisationPath.'rows, do you want to select all')); ?>

                        <?php if(!$simplePagination): ?> <strong><span x-text="paginationTotalItemCount"></span></strong> <?php endif; ?>
                    </span>

                    <button
                        x-on:click="selectAllOnPage()"
                        wire:loading.attr="disabled"
                        type="button"
                        <?php echo e($this->getBulkActionsRowButtonAttributesBag->class([
                                'ml-1 underline text-sm leading-5 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true),
                                'text-blue-600 text-gray-700 focus:text-gray-800 dark:text-white dark:hover:text-gray-400' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-colors'] ?? true),
                                'btn btn-primary btn-sm' => $isBootstrap && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true)
                            ])); ?>


                    ><?php echo e(__($localisationPath.'Select All On Page')); ?>

                    </button>&nbsp;

                    <button
                        x-on:click="setAllSelected()"
                        wire:loading.attr="disabled"
                        type="button"
                        <?php echo e($this->getBulkActionsRowButtonAttributesBag->class([
                                'ml-1 underline text-sm leading-5 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true),
                                'text-blue-600 text-gray-700 focus:text-gray-800 dark:text-white dark:hover:text-gray-400' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-colors'] ?? true),
                                'btn btn-primary btn-sm' => $isBootstrap && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true)
                            ])); ?>

                    >
                        <?php echo e(__($localisationPath.'Select All')); ?>

                    </button>

                    <button
                        x-on:click="clearSelected"
                        wire:loading.attr="disabled"
                        type="button"
                        <?php echo e($this->getBulkActionsRowButtonAttributesBag->class([
                                'ml-1 underline text-sm leading-5 font-medium focus:outline-none focus:underline transition duration-150 ease-in-out' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true),
                                'text-blue-600 text-gray-700 focus:text-gray-800 dark:text-white dark:hover:text-gray-400' => $isTailwind && ($this->getBulkActionsRowButtonAttributes['default-colors'] ?? true),
                                'btn btn-primary btn-sm' => $isBootstrap && ($this->getBulkActionsRowButtonAttributes['default-styling'] ?? true)
                            ])); ?>

                    >
                        <?php echo e(__($localisationPath.'Deselect All')); ?>

                    </button>
                </div>
            </template>
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
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\tr\bulk-actions.blade.php ENDPATH**/ ?>