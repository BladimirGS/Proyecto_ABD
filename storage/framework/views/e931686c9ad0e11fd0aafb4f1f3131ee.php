<?php foreach (([ 'tableName','isTailwind','isBootstrap','isBootstrap4','isBootstrap5', 'localisationPath']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'ml-0 ml-md-2' => $isBootstrap4,
        'ms-0 ms-md-2' => $isBootstrap5,
    ]); ?>"
>
    <select wire:model.live="perPage" id="<?php echo e($tableName); ?>-perPage"
        <?php echo e($attributes->merge($this->getPerPageFieldAttributes())
            ->class([
                'form-control' => $isBootstrap4 && $this->getPerPageFieldAttributes()['default-styling'],
                'form-select' => $isBootstrap5 && $this->getPerPageFieldAttributes()['default-styling'],
                'block w-full rounded-md shadow-sm transition duration-150 ease-in-out sm:text-sm sm:leading-5 focus:ring focus:ring-opacity-50' => $isTailwind && $this->getPerPageFieldAttributes()['default-styling'],
                'border-gray-300 focus:border-indigo-300 focus:ring-indigo-200 dark:bg-gray-700 dark:text-white dark:border-gray-600' => $isTailwind && $this->getPerPageFieldAttributes()['default-colors'],
            ])
            ->except(['default','default-styling','default-colors'])); ?>

    >
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $this->getPerPageAccepted(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($item); ?>"
                wire:key="<?php echo e($tableName); ?>-per-page-<?php echo e($item); ?>"
            >
                <?php echo e($item === -1 ? __($localisationPath.'All') : $item); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </select>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/tools/toolbar/items/pagination-dropdown.blade.php ENDPATH**/ ?>