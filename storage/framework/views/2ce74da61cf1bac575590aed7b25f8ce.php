<?php foreach ((['isTailwind','isBootstrap4','isBootstrap5', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<button type="button" wire:click.prevent="setFilterDefaults" x-on:click="filterPopoverOpen = false" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'w-full inline-flex items-center justify-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-600 dark:text-white dark:hover:border-gray-500 dark:hover:bg-gray-600' => $isTailwind,
        'dropdown-item btn text-center' => $isBootstrap4,
        'dropdown-item text-center' => $isBootstrap5,
    ]); ?>">
    <?php echo e(__($localisationPath.'Clear')); ?>

</button><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/tools/toolbar/items/filter-popover/clear-button.blade.php ENDPATH**/ ?>