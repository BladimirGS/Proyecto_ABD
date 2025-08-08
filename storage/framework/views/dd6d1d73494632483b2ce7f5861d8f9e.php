<?php foreach ((['isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<div <?php echo e($attributes->merge($this->getToolsAttributes)
        ->class([
            'flex-col' => $isTailwind && ($this->getToolsAttributes['default-styling'] ?? true),
            'd-flex flex-column' => $isBootstrap && ($this->getToolsAttributes['default-styling'] ?? true)
        ])
        ->except(['default','default-styling','default-colors'])); ?>

>
    <?php echo e($slot); ?>

</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/tools.blade.php ENDPATH**/ ?>