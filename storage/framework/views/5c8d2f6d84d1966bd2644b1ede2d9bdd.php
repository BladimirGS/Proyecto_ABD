<a <?php echo e($attributes->merge()
            ->class([
                'justify-center text-center items-center inline-flex space-x-2 rounded-md border shadow-sm px-4 py-2 text-sm font-medium focus:ring focus:ring-opacity-50' => $isTailwind && ($attributes['default-styling'] ?? true),
                'focus:border-indigo-300 focus:ring-indigo-200' => $isTailwind && ($attributes['default-colors'] ?? true),
                'btn btn-sm btn-success' => $isBootstrap && ($attributes['default-styling'] ?? true),
                '' => $isBootstrap && ($attributes['default-colors'] ?? true),
            ])
            ->except(['default','default-styling','default-colors'])); ?>

           <?php if($action->hasWireAction()): ?>
            <?php echo e($action->getWireAction()); ?>="<?php echo e($action->getWireActionParams()); ?>"
           <?php endif; ?>
           <?php if($action->getWireNavigateEnabled()): ?>
            wire:navigate
           <?php endif; ?>
        >

        <?php if($action->hasIcon() && $action->getIconRight()): ?>
            <span <?php echo e($action->getLabelAttributesBag()); ?>><?php echo e($action->getLabel()); ?></span>
            <i <?php echo e($action->getIconAttributes()
                    ->class([
                        'ms-1 '. $action->getIcon() => $isBootstrap,
                        'ml-1 '. $action->getIcon() => $isTailwind,
                    ])
                    ->except(['default','default-styling','default-colors'])); ?>

            ></i>
        <?php elseif($action->hasIcon() && !$action->getIconRight()): ?>
            <i <?php echo e($action->getIconAttributes()
                    ->class([
                        'ms-1 '. $action->getIcon() => $isBootstrap,
                        'mr-1 '. $action->getIcon() => $isTailwind,
                    ])
                    ->except(['default','default-styling','default-colors'])); ?>

            ></i>
            <span <?php echo e($action->getLabelAttributesBag()); ?>><?php echo e($action->getLabel()); ?></span>
        <?php else: ?>
            <span <?php echo e($action->getLabelAttributesBag()); ?>><?php echo e($action->getLabel()); ?></span>
        <?php endif; ?>
</a>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\includes\actions\button.blade.php ENDPATH**/ ?>