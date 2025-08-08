<?php foreach ((['tableName']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php if($this->isBootstrap): ?>
    <ul x-cloak <?php echo e($attributes
            ->merge($this->getFilterPopoverAttributes)
            ->merge(['role' => 'menu'])
            ->class([
                'w-100' => $this->getFilterPopoverAttributes['default-width'] ?? true,
                'dropdown-menu mt-md-5' => $this->isBootstrap4,
                'dropdown-menu' => $this->isBootstrap5,
            ])); ?> x-bind:class="{ 'show': filterPopoverOpen }">
        <?php $__currentLoopData = $this->getVisibleFilters(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>-wrapper" wire:key="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>-toolbar" class="p-2">
                <?php echo e($filter->setGenericDisplayData($this->getFilterGenericData)->render()); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($this->hasAppliedVisibleFiltersWithValuesThatCanBeCleared()): ?>
            <div class='dropdown-divider'></div>
            <?php if (isset($component)) { $__componentOriginalcc1f06c21e531811467957c06eeb04f9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc1f06c21e531811467957c06eeb04f9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.toolbar.items.filter-popover.clear-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.toolbar.items.filter-popover.clear-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc1f06c21e531811467957c06eeb04f9)): ?>
<?php $attributes = $__attributesOriginalcc1f06c21e531811467957c06eeb04f9; ?>
<?php unset($__attributesOriginalcc1f06c21e531811467957c06eeb04f9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc1f06c21e531811467957c06eeb04f9)): ?>
<?php $component = $__componentOriginalcc1f06c21e531811467957c06eeb04f9; ?>
<?php unset($__componentOriginalcc1f06c21e531811467957c06eeb04f9); ?>
<?php endif; ?>
        <?php endif; ?>
    </ul>
<?php else: ?>
    <div x-cloak x-show="filterPopoverOpen"
        <?php echo e($attributes
            ->merge($this->getFilterPopoverAttributes)
            ->merge([
                'role' => 'menu',
                'aria-orientation' => 'vertical',
                'aria-labelledby' => 'filters-menu',
                'x-transition:enter' => 'transition ease-out duration-100',
                'x-transition:enter-start' => 'transform opacity-0 scale-95',
                'x-transition:enter-end' => 'transform opacity-100 scale-100',
                'x-transition:leave' => 'transition ease-in duration-75',
                'x-transition:leave-start' => 'transform opacity-100 scale-100',
                'x-transition:leave-end' => 'transform opacity-0 scale-95',
            ])
            ->class([
                'w-full md:w-56' => $this->getFilterPopoverAttributes['default-width'] ?? true,
                'origin-top-left absolute left-0 mt-2 rounded-md shadow-lg ring-1 ring-opacity-5 divide-y focus:outline-none z-50' => $this->getFilterPopoverAttributes['default-styling'] ?? true,
                'bg-white divide-gray-100 ring-black dark:bg-gray-700 dark:text-white dark:divide-gray-600' => $this->getFilterPopoverAttributes['default-colors'] ?? true,
            ])
            ->except(['x-cloak', 'x-show', 'default','default-width', 'default-styling','default-colors'])); ?>>

        <?php $__currentLoopData = $this->getVisibleFilters(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="py-1" role="none">
                <div id="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>-wrapper" wire:key="<?php echo e($tableName); ?>-filter-<?php echo e($filter->getKey()); ?>-toolbar" class="block px-4 py-2 text-sm text-gray-700 space-y-1" role="menuitem">
                    <?php echo e($filter->setGenericDisplayData($this->getFilterGenericData)->render()); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($this->hasAppliedVisibleFiltersWithValuesThatCanBeCleared()): ?>
            <div class="block px-4 py-3 text-sm text-gray-700 dark:text-white" role="menuitem">
                <?php if (isset($component)) { $__componentOriginalcc1f06c21e531811467957c06eeb04f9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcc1f06c21e531811467957c06eeb04f9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.toolbar.items.filter-popover.clear-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.toolbar.items.filter-popover.clear-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcc1f06c21e531811467957c06eeb04f9)): ?>
<?php $attributes = $__attributesOriginalcc1f06c21e531811467957c06eeb04f9; ?>
<?php unset($__attributesOriginalcc1f06c21e531811467957c06eeb04f9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcc1f06c21e531811467957c06eeb04f9)): ?>
<?php $component = $__componentOriginalcc1f06c21e531811467957c06eeb04f9; ?>
<?php unset($__componentOriginalcc1f06c21e531811467957c06eeb04f9); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\toolbar\items\filter-popover.blade.php ENDPATH**/ ?>