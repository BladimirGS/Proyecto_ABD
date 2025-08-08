<?php foreach ((['isTailwind', 'isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php ($actionWrapperAttributes = $this->getActionWrapperAttributes()); ?>
<div <?php echo e($attributes
            ->merge($this->actionWrapperAttributes)
            ->class([
                'flex flex-cols py-2 space-x-2' => $isTailwind && ($actionWrapperAttributes['default-styling'] ?? true),
                '' => $isTailwind && ($actionWrapperAttributes['default-colors'] ?? true),
                'd-flex flex-cols py-2 space-x-2' => $isBootstrap && ($this->actionWrapperAttributes['default-styling'] ?? true),
                '' => $isBootstrap && ($actionWrapperAttributes['default-colors'] ?? true),
                'justify-start' => $this->getActionsPosition === 'left',
                'justify-center' => $this->getActionsPosition === 'center',
                'justify-end' => $this->getActionsPosition === 'right',
                'pl-2' => $this->showActionsInToolbar && $this->getActionsPosition === 'left',
                'pr-2' => $this->showActionsInToolbar && $this->getActionsPosition === 'right',
            ])
            ->except(['default','default-styling','default-colors'])); ?> >
    <?php $__currentLoopData = $this->getActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($action->render()); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\includes\actions.blade.php ENDPATH**/ ?>