<?php foreach (([ 'tableName','primaryKey', 'isTailwind', 'isBootstrap', 'isBootstrap4', 'isBootstrap5']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['row', 'rowIndex']));

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

foreach (array_filter((['row', 'rowIndex']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
    $tdAttributes = $this->getBulkActionsTdAttributes;
    $tdCheckboxAttributes = $this->getBulkActionsTdCheckboxAttributes;
?>

<?php if($this->showBulkActionsSections()): ?>
    <?php if (isset($component)) { $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.plain','data' => ['wire:key' => ''.e($tableName).'-tbody-td-bulk-actions-td-'.e($row->{$primaryKey}).'','displayMinimisedOnReorder' => true,'customAttributes' => $tdAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.plain'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName).'-tbody-td-bulk-actions-td-'.e($row->{$primaryKey}).'','displayMinimisedOnReorder' => true,'customAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tdAttributes)]); ?>
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'inline-flex rounded-md shadow-sm' => $isTailwind,
            'form-check' => $isBootstrap5,
        ]); ?>">
            <?php if (isset($component)) { $__componentOriginalbf8a771bc8b62eea8c2975c8fd9484a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbf8a771bc8b62eea8c2975c8fd9484a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.forms.checkbox','data' => ['wire:key' => ''.e($tableName . 'selectedItems-'.$row->{$primaryKey}).'','value' => ''.e($row->{$primaryKey}).'','checkboxAttributes' => $tdCheckboxAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName . 'selectedItems-'.$row->{$primaryKey}).'','value' => ''.e($row->{$primaryKey}).'','checkboxAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tdCheckboxAttributes)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbf8a771bc8b62eea8c2975c8fd9484a8)): ?>
<?php $attributes = $__attributesOriginalbf8a771bc8b62eea8c2975c8fd9484a8; ?>
<?php unset($__attributesOriginalbf8a771bc8b62eea8c2975c8fd9484a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbf8a771bc8b62eea8c2975c8fd9484a8)): ?>
<?php $component = $__componentOriginalbf8a771bc8b62eea8c2975c8fd9484a8; ?>
<?php unset($__componentOriginalbf8a771bc8b62eea8c2975c8fd9484a8); ?>
<?php endif; ?>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $attributes = $__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__attributesOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614)): ?>
<?php $component = $__componentOriginalbaa855bb6e405acd6dcbf114ebb44614; ?>
<?php unset($__componentOriginalbaa855bb6e405acd6dcbf114ebb44614); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\components\table\td\bulk-actions.blade.php ENDPATH**/ ?>