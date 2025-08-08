<?php foreach (([ 'tableName','isTailwind','isBootstrap']) as $__key => $__value) {
    $__consumeVariable = is_string($__key) ? $__key : $__value;
    $$__consumeVariable = is_string($__key) ? $__env->getConsumableComponentData($__key, $__value) : $__env->getConsumableComponentData($__value);
} ?>

<?php
    $customAttributes = [
        'wrapper' => $this->getTableWrapperAttributes(),
        'table' => $this->getTableAttributes(),
        'thead' => $this->getTheadAttributes(),
        'tbody' => $this->getTbodyAttributes(),
    ];
?>

<!--[if BLOCK]><![endif]--><?php if($isTailwind): ?>
    <div
        wire:key="<?php echo e($tableName); ?>-twrap"
        <?php echo e($attributes->merge($customAttributes['wrapper'])
            ->class([
                'shadow overflow-y-auto border-b border-gray-200 dark:border-gray-700 sm:rounded-lg' => $customAttributes['wrapper']['default'] ?? true
            ])
            ->except(['default','default-styling','default-colors'])); ?>

    >
        <table
            wire:key="<?php echo e($tableName); ?>-table"
            <?php echo e($attributes->merge($customAttributes['table'])
                ->class(['min-w-full divide-y divide-gray-200 dark:divide-none' => $customAttributes['table']['default'] ?? true])
                ->except(['default','default-styling','default-colors'])); ?>


        >
            <thead wire:key="<?php echo e($tableName); ?>-thead"
                <?php echo e($attributes->merge($customAttributes['thead'])
                    ->class([
                        'bg-gray-50 dark:bg-gray-800' => $customAttributes['thead']['default'] ?? true
                    ])
                    ->except(['default','default-styling','default-colors'])); ?>

            >
                <tr>
                    <?php echo e($thead); ?>

                </tr>
            </thead>

            <tbody
                wire:key="<?php echo e($tableName); ?>-tbody"
                id="<?php echo e($tableName); ?>-tbody"
                <?php echo e($attributes->merge($customAttributes['tbody'])
                        ->class([
                            'bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-none' => $customAttributes['tbody']['default'] ?? true
                        ])
                        ->except(['default','default-styling','default-colors'])); ?>

            >
                <?php echo e($slot); ?>

            </tbody>

            <!--[if BLOCK]><![endif]--><?php if(isset($tfoot)): ?>
                <tfoot wire:key="<?php echo e($tableName); ?>-tfoot">
                    <?php echo e($tfoot); ?>

                </tfoot>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </table>
    </div>
<?php elseif($isBootstrap): ?>
    <div wire:key="<?php echo e($tableName); ?>-twrap"
        <?php echo e($attributes->merge($customAttributes['wrapper'])
            ->class(['table-responsive' => $customAttributes['wrapper']['default'] ?? true])
            ->except(['default','default-styling','default-colors'])); ?>

    >
        <table
            wire:key="<?php echo e($tableName); ?>-table"
            <?php echo e($attributes->merge($customAttributes['table'])
                ->class(['laravel-livewire-table table' => $customAttributes['table']['default'] ?? true])
                ->except(['default','default-styling','default-colors'])); ?>

        >
            <thead
                wire:key="<?php echo e($tableName); ?>-thead"
                <?php echo e($attributes->merge($customAttributes['thead'])
                    ->class(['' => $customAttributes['thead']['default'] ?? true])
                    ->except(['default','default-styling','default-colors'])); ?>

            >
                <tr>
                    <?php echo e($thead); ?>

                </tr>
            </thead>

            <tbody
                wire:key="<?php echo e($tableName); ?>-tbody"
                id="<?php echo e($tableName); ?>-tbody"
                <?php echo e($attributes->merge($customAttributes['tbody'])
                        ->class(['' => $customAttributes['tbody']['default'] ?? true])
                        ->except(['default','default-styling','default-colors'])); ?>

            >
                <?php echo e($slot); ?>

            </tbody>

            <!--[if BLOCK]><![endif]--><?php if(isset($tfoot)): ?>
                <tfoot wire:key="<?php echo e($tableName); ?>-tfoot">
                    <?php echo e($tfoot); ?>

                </tfoot>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </table>
    </div>
<?php endif; ?><!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\src/../resources/views/components/table.blade.php ENDPATH**/ ?>