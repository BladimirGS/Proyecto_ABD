<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'items-center content-center place-content-center place-items-center' => $isTailwind,
            ]); ?>"
>
    <div <?php echo e($attributeBag->class([
            'h-6 w-6 rounded-md self-center' => $isTailwind && ($attributeBag['default'] ?? (empty($attributeBag['class']) || (!empty($attributeBag['class']) && ($attributeBag['default'] ?? false)))),
            
        ])); ?>

        style="<?php echo \Illuminate\Support\Arr::toCssStyles([
            "background-color: {$color}" => $color,
        ]) ?>"
    >
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\includes\columns\color.blade.php ENDPATH**/ ?>