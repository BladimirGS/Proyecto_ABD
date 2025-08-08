<?php foreach ((['isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<input
    wire:model<?php echo e($this->getSearchOptions()); ?>="search"
    placeholder="<?php echo e($this->getSearchPlaceholder()); ?>"
    type="text"
    <?php echo e($attributes->merge($this->getSearchFieldAttributes())
        ->class([
            'rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-none rounded-l-md focus:ring-0 focus:border-gray-300' => $isTailwind && $this->hasSearch() && (($this->getSearchFieldAttributes()['default'] ?? true) || ($this->getSearchFieldAttributes()['default-styling'] ?? true)),
            'rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 rounded-md focus:ring focus:ring-opacity-50' => $isTailwind && !$this->hasSearch()  && (($this->getSearchFieldAttributes()['default'] ?? true) || ($this->getSearchFieldAttributes()['default-styling'] ?? true)),
            'border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-gray-300' => $isTailwind && $this->hasSearch()  && (($this->getSearchFieldAttributes()['default'] ?? true) || ($this->getSearchFieldAttributes()['default-colors'] ?? true)),
            'border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:border-indigo-300 focus:ring-indigo-200' => $isTailwind && !$this->hasSearch()  && (($this->getSearchFieldAttributes()['default'] ?? true) || ($this->getSearchFieldAttributes()['default-colors'] ?? true)),
            'block w-full' => !$this->hasSearchIcon,
            'pl-8 pr-4' => $this->hasSearchIcon,
            'form-control' => $isBootstrap && $this->getSearchFieldAttributes()['default'] ?? true,
        ])
        ->except(['default','default-styling','default-colors'])); ?>


/><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/tools/toolbar/items/search/input.blade.php ENDPATH**/ ?>