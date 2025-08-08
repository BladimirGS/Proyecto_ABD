<?php foreach ((['isTailwind','isBootstrap','isBootstrap4','isBootstrap5', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php if($isTailwind): ?>
    <button
        x-on:click.prevent="resetAllFilters"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'focus:outline-none active:outline-none'
        ]); ?>">
        <span
            <?php echo e($attributes->merge($this->getFilterPillsResetAllButtonAttributes)
                ->class([
                    'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium' => ($this->getFilterPillsResetAllButtonAttributes['default-styling'] ?? true),
                    'bg-gray-100 text-gray-800 dark:bg-gray-200 dark:text-gray-900' => ($this->getFilterPillsResetAllButtonAttributes['default-colors'] ?? true),
                ])
                ->except(['default-styling', 'default-colors'])); ?>

        >
            <?php echo e(__($localisationPath.'Clear')); ?>

        </span>
    </button>
<?php else: ?>
    <a
        href="#"
        x-on:click.prevent="resetAllFilters"
        <?php echo e($attributes->merge($this->getFilterPillsResetAllButtonAttributes)
            ->class([
                'badge badge-pill badge-light' => $isBootstrap4 && ($this->getFilterPillsResetAllButtonAttributes['default-styling'] ?? true),
                'badge rounded-pill bg-light text-dark text-decoration-none' => $isBootstrap5 && ($this->getFilterPillsResetAllButtonAttribute['default-styling'] ?? true),
            ])
            ->except(['default-styling', 'default-colors'])); ?>

    >
        <?php echo e(__($localisationPath.'Clear')); ?>

    </a>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filter-pills\buttons\reset-all.blade.php ENDPATH**/ ?>