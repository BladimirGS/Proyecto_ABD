<?php
    $customThAttributes = $this->hasReorderThAttributes() ? $this->getReorderThAttributes() : $this->getAllThAttributes($this->getReorderColumn())['customAttributes'];
?>

<?php if (isset($component)) { $__componentOriginal996070e5d95898390de29378c8f7fabb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal996070e5d95898390de29378c8f7fabb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th.plain','data' => ['xCloak' => true,'xShow' => 'currentlyReorderingStatus','wire:key' => ''.e($this->getTableName).'-thead-reorder','displayMinimisedOnReorder' => false,'attributes' => $attributes->merge($customThAttributes)
            ->class([
                'table-cell px-6 py-3 text-left text-xs font-medium whitespace-nowrap uppercase tracking-wider' => $this->isTailwind && (($customThAttributes['default-styling'] ?? true) || ($customThAttributes['default'] ?? true)),
                'text-gray-500 dark:bg-gray-800 dark:text-gray-400' => $this->isTailwind && (($customThAttributes['default-colors'] ?? true) || ($customThAttributes['default'] ?? true)),
                'laravel-livewire-tables-reorderingMinimised' => $this->isBootstrap && ($customThAttributes['default'] ?? true),
            ])
            ->except(['default','default-styling','default-colors'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'currentlyReorderingStatus','wire:key' => ''.e($this->getTableName).'-thead-reorder','displayMinimisedOnReorder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge($customThAttributes)
            ->class([
                'table-cell px-6 py-3 text-left text-xs font-medium whitespace-nowrap uppercase tracking-wider' => $this->isTailwind && (($customThAttributes['default-styling'] ?? true) || ($customThAttributes['default'] ?? true)),
                'text-gray-500 dark:bg-gray-800 dark:text-gray-400' => $this->isTailwind && (($customThAttributes['default-colors'] ?? true) || ($customThAttributes['default'] ?? true)),
                'laravel-livewire-tables-reorderingMinimised' => $this->isBootstrap && ($customThAttributes['default'] ?? true),
            ])
            ->except(['default','default-styling','default-colors']))]); ?>
    <div x-cloak x-show="currentlyReorderingStatus"></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal996070e5d95898390de29378c8f7fabb)): ?>
<?php $attributes = $__attributesOriginal996070e5d95898390de29378c8f7fabb; ?>
<?php unset($__attributesOriginal996070e5d95898390de29378c8f7fabb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal996070e5d95898390de29378c8f7fabb)): ?>
<?php $component = $__componentOriginal996070e5d95898390de29378c8f7fabb; ?>
<?php unset($__componentOriginal996070e5d95898390de29378c8f7fabb); ?>
<?php endif; ?>

<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\th\reorder.blade.php ENDPATH**/ ?>