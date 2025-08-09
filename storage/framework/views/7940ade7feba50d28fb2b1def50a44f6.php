<?php foreach (([ 'tableName','isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['rowIndex', 'hidden' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['rowIndex', 'hidden' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<!--[if BLOCK]><![endif]--><?php if($this->collapsingColumnsAreEnabled && $this->hasCollapsedColumns): ?>
    <td x-data="{open:false}" wire:key="<?php echo e($tableName); ?>-collapsingIcon-<?php echo e($rowIndex); ?>-<?php echo e(md5(now())); ?>"
        <?php echo e($attributes
                ->merge()
                ->class([
                    'p-3 table-cell text-center' => $isTailwind,
                    'sm:hidden' => $isTailwind && !$this->shouldCollapseAlways() && !$this->shouldCollapseOnTablet(),
                    'md:hidden' => $isTailwind && !$this->shouldCollapseAlways() && !$this->shouldCollapseOnTablet() && $this->shouldCollapseOnMobile(),
                    'lg:hidden' => $isTailwind && !$this->shouldCollapseAlways() && ($this->shouldCollapseOnTablet() || $this->shouldCollapseOnMobile()),
                    'd-sm-none' => $isBootstrap && !$this->shouldCollapseAlways() && !$this->shouldCollapseOnTablet(),
                    'd-md-none' => $isBootstrap && !$this->shouldCollapseAlways() && !$this->shouldCollapseOnTablet() && $this->shouldCollapseOnMobile(),
                    'd-lg-none' => $isBootstrap && !$this->shouldCollapseAlways() && ($this->shouldCollapseOnTablet() || $this->shouldCollapseOnMobile()),
                ])); ?>

        :class="currentlyReorderingStatus ? 'laravel-livewire-tables-reorderingMinimised' : ''"
    >
        <!--[if BLOCK]><![endif]--><?php if(! $hidden): ?>
            <button
                x-cloak x-show="!currentlyReorderingStatus"
                x-on:click.prevent="$dispatch('toggle-row-content', {'tableName': '<?php echo e($tableName); ?>', 'row': <?php echo e($rowIndex); ?>}); open = !open"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'border-0 bg-transparent p-0' => $isBootstrap
                ]); ?>"
            >
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-plus-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => '!open','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge($this->getCollapsingColumnButtonExpandAttributes)
                        ->class([
                            'h-6 w-6' => $isTailwind && ($this->getCollapsingColumnButtonExpandAttributes['default-styling'] ?? true),
                            'text-green-600' => $isTailwind && ($this->getCollapsingColumnButtonExpandAttributes['default-colors'] ?? true),
                            'laravel-livewire-tables-btn-lg text-success' => $isBootstrap && ($this->getCollapsingColumnButtonExpandAttributes['default-colors'] ?? true)
                        ])
                        ->except(['default','default-styling','default-colors']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-minus-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'open','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge($this->getCollapsingColumnButtonCollapseAttributes)
                        ->class([
                            'h-6 w-6' => $isTailwind && ($this->getCollapsingColumnButtonCollapseAttributes['default-styling'] ?? true),
                            'text-yellow-600' => $isTailwind && ($this->getCollapsingColumnButtonCollapseAttributes['default-colors'] ?? true),
                            'laravel-livewire-tables-btn-lg text-warning' => $isBootstrap && ($this->getCollapsingColumnButtonExpandAttributes['default-colors'] ?? true),
                        ])
                        ->except(['default','default-styling','default-colors']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
            </button>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]--> 
    </td>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/table/td/collapsed-columns.blade.php ENDPATH**/ ?>