<?php
    $filterKey = $filter->getKey();
    $currentMin = $minRange = $filter->getConfig('minRange');
    $currentMax = $maxRange = $filter->getConfig('maxRange');
    $suffix = $filter->hasConfig('suffix') ? '--suffix:"'. $filter->getConfig('suffix') .'";' : '';
    $prefix = $filter->hasConfig('prefix') ? '--prefix:"'.$filter->getConfig('prefix').'";' : '';
?>

<div id="<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>" x-data="numberRangeFilter($wire,'<?php echo e($filterKey); ?>', '<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>-wrapper', <?php echo \Illuminate\Support\Js::from($filter->getConfigs())->toHtml() ?>, '<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>')" x-on:mousedown.away.throttle.2000ms="updateWireable" x-on:touchstart.away.throttle.2000ms="updateWireable" x-on:mouseleave.throttle.2000ms="updateWireable">
    <?php if (isset($component)) { $__componentOriginal3d520986b3faee512e1fc7aea1837396 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3d520986b3faee512e1fc7aea1837396 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.filter-label','data' => ['for' => ''.e($tableName.'-numberRange-'.$filterKey.'-min').'','filter' => $filter,'filterLayout' => $filterLayout,'tableName' => $tableName,'isTailwind' => $isTailwind,'isBootstrap4' => $isBootstrap4,'isBootstrap5' => $isBootstrap5,'isBootstrap' => $isBootstrap]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.filter-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => ''.e($tableName.'-numberRange-'.$filterKey.'-min').'','filter' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filter),'filterLayout' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($filterLayout),'tableName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName),'isTailwind' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isTailwind),'isBootstrap4' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap4),'isBootstrap5' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap5),'isBootstrap' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3d520986b3faee512e1fc7aea1837396)): ?>
<?php $attributes = $__attributesOriginal3d520986b3faee512e1fc7aea1837396; ?>
<?php unset($__attributesOriginal3d520986b3faee512e1fc7aea1837396); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3d520986b3faee512e1fc7aea1837396)): ?>
<?php $component = $__componentOriginal3d520986b3faee512e1fc7aea1837396; ?>
<?php unset($__componentOriginal3d520986b3faee512e1fc7aea1837396); ?>
<?php endif; ?>
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'mt-4 h-22 pt-8 pb-4 grid gap-10' => $isTailwind,
            'mt-4 h-22 w-100 pb-4 pt-2 grid gap-10' => $isBootstrap,
        ]); ?>"
        wire:ignore
    >
        <div
            id="<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>-wrapper" data-ticks-position='bottom'
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'range-slider flat' => $isTailwind,
                'range-slider flat w-100' => $isBootstrap,
            ]); ?>"
            style=' --min:<?php echo e($minRange); ?>; --max:<?php echo e($maxRange); ?>; <?php echo e($suffix . $prefix); ?>'
        >
            <input type="range" min="<?php echo e($minRange); ?>" max="<?php echo e($maxRange); ?>" value="<?php echo e($currentMin); ?>"
                id="<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>-min" x-model='filterMin' x-on:change="updateWire()"
                oninput="this.parentNode.style.setProperty('--value-a',this.value); this.parentNode.style.setProperty('--text-value-a', JSON.stringify(this.value))"
            />
            <output></output>
            <input type="range" min="<?php echo e($minRange); ?>" max="<?php echo e($maxRange); ?>" value="<?php echo e($currentMax); ?>"
                id="<?php echo e($tableName); ?>-numberRange-<?php echo e($filterKey); ?>-max" x-model='filterMax' x-on:change="updateWire()"
                oninput="this.parentNode.style.setProperty('--value-b',this.value); this.parentNode.style.setProperty('--text-value-b', JSON.stringify(this.value))"
            />
            <output></output>
            <div class='range-slider__progress'></div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\tools\filters\number-range.blade.php ENDPATH**/ ?>