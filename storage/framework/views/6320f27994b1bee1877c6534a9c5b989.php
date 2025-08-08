<?php foreach ((['isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php ($attributes = $attributes->merge(['wire:key' => 'empty-message-'.$this->getId()])); ?>

<?php if($isTailwind): ?>
    <tr <?php echo e($attributes); ?>>
        <td colspan="<?php echo e($this->getColspanCount()); ?>">
            <div class="flex justify-center items-center space-x-2 dark:bg-gray-800">
                <span class="font-medium py-8 text-gray-400 text-lg dark:text-white"><?php echo e($this->getEmptyMessage()); ?></span>
            </div>
        </td>
    </tr>
<?php elseif($isBootstrap): ?>
     <tr <?php echo e($attributes); ?>>
        <td colspan="<?php echo e($this->getColspanCount()); ?>">
            <?php echo e($this->getEmptyMessage()); ?>

        </td>
    </tr>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\empty.blade.php ENDPATH**/ ?>