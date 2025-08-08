<?php foreach ((['tableName','isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php
    $customAttributes = $this->hasBulkActionsThAttributes ? $this->getBulkActionsThAttributes : $this->getAllThAttributes($this->getBulkActionsColumn())['customAttributes'];
    $bulkActionsThCheckboxAttributes = $this->getBulkActionsThCheckboxAttributes();
?>

<!--[if BLOCK]><![endif]--><?php if($this->bulkActionsAreEnabled() && $this->hasBulkActions()): ?>
    <?php if (isset($component)) { $__componentOriginal996070e5d95898390de29378c8f7fabb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal996070e5d95898390de29378c8f7fabb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th.plain','data' => ['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName).'-thead-bulk-actions','customAttributes' => $customAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true,'wire:key' => ''.e($tableName).'-thead-bulk-actions','customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($customAttributes)]); ?>
        <div
            x-data="{newSelectCount: 0, indeterminateCheckbox: false, bulkActionHeaderChecked: false}"
            x-init="$watch('selectedItems', value => indeterminateCheckbox = (value.length > 0 && value.length < paginationTotalItemCount))"
            x-cloak x-show="currentlyReorderingStatus !== true"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'inline-flex rounded-md shadow-sm' => $isTailwind,
                'form-check' => $isBootstrap,
            ]); ?>"
        >
            <input
                x-init="$watch('indeterminateCheckbox', value => $el.indeterminate = value); $watch('selectedItems', value => newSelectCount = value.length);"
                x-on:click="if(selectedItems.length == paginationTotalItemCount) { $el.indeterminate = false; $wire.clearSelected(); bulkActionHeaderChecked = false; } else { bulkActionHeaderChecked = true; $el.indeterminate = false; $wire.setAllSelected(); }"
                type="checkbox"
                :checked="selectedItems.length == paginationTotalItemCount"
                <?php echo e($attributes->merge($bulkActionsThCheckboxAttributes)->class([
                        'border-gray-300 text-indigo-600 focus:border-indigo-300 focus:ring-indigo-200 dark:bg-gray-900 dark:text-white dark:border-gray-600 dark:hover:bg-gray-600 dark:focus:bg-gray-600' => $isTailwind && (($bulkActionsThCheckboxAttributes['default'] ?? true) || ($bulkActionsThCheckboxAttributes['default-colors'] ?? true)),
                        'rounded shadow-sm transition duration-150 ease-in-out focus:ring focus:ring-opacity-50 ' => $isTailwind && (($bulkActionsThCheckboxAttributes['default'] ?? true) || ($bulkActionsThCheckboxAttributes['default-styling'] ?? true)),
                        'form-check-input' => $isBootstrap && ($bulkActionsThCheckboxAttributes['default'] ?? true),
                    ])->except(['default','default-styling','default-colors'])); ?>

            />
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal996070e5d95898390de29378c8f7fabb)): ?>
<?php $attributes = $__attributesOriginal996070e5d95898390de29378c8f7fabb; ?>
<?php unset($__attributesOriginal996070e5d95898390de29378c8f7fabb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal996070e5d95898390de29378c8f7fabb)): ?>
<?php $component = $__componentOriginal996070e5d95898390de29378c8f7fabb; ?>
<?php unset($__componentOriginal996070e5d95898390de29378c8f7fabb); ?>
<?php endif; ?>
<?php endif; ?><!--[if ENDBLOCK]><![endif]--><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/table/th/bulk-actions.blade.php ENDPATH**/ ?>