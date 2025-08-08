<div>
    <?php if($this->debugIsEnabled()): ?>
        <p><strong><?php echo e(__($this->getLocalisationPath.'Debugging Values')); ?>:</strong></p>
        

        <?php if(! app()->runningInConsole()): ?>
            <div class="mb-4"><?php dump((new \Rappasoft\LaravelLivewireTables\DataTransferObjects\DebuggableData($this))->toArray()); ?></div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\includes\debug.blade.php ENDPATH**/ ?>