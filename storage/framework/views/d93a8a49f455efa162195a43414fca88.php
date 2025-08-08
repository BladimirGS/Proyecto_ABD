<?php ($tableName = $this->getTableName); ?>
<?php ($tableId = $this->getTableId); ?>
<?php ($primaryKey = $this->getPrimaryKey); ?>
<?php ($isTailwind = $this->isTailwind); ?>
<?php ($isBootstrap = $this->isBootstrap); ?>
<?php ($isBootstrap4 = $this->isBootstrap4); ?>
<?php ($isBootstrap5 = $this->isBootstrap5); ?>
<?php ($localisationPath = $this->getLocalisationPath); ?>

<div>
    <div x-data="{ currentlyReorderingStatus: false }">
        <div <?php echo e($this->getTopLevelAttributes()); ?>>

            <?php echo $__env->renderWhen(
                $this->hasConfigurableAreaFor('before-wrapper'),
                $this->getConfigurableAreaFor('before-wrapper'),
                $this->getParametersForConfigurableArea('before-wrapper')
            , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

            <?php if (isset($component)) { $__componentOriginalb5dab5ce914f340564fc175ce94266c7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5dab5ce914f340564fc175ce94266c7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.wrapper','data' => ['tableName' => $tableName,'primaryKey' => $primaryKey,'isTailwind' => $isTailwind,'isBootstrap' => $isBootstrap,'isBootstrap4' => $isBootstrap4,'isBootstrap5' => $isBootstrap5,'localisationPath' => $localisationPath]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tableName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName),'primaryKey' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($primaryKey),'isTailwind' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isTailwind),'isBootstrap' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap),'isBootstrap4' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap4),'isBootstrap5' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isBootstrap5),'localisationPath' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($localisationPath)]); ?>
                <?php if($this->hasActions && !$this->showActionsInToolbar): ?>
                    <?php if (isset($component)) { $__componentOriginal59c796603a9fe3a5632766e1b08f5eca = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal59c796603a9fe3a5632766e1b08f5eca = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.includes.actions','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::includes.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal59c796603a9fe3a5632766e1b08f5eca)): ?>
<?php $attributes = $__attributesOriginal59c796603a9fe3a5632766e1b08f5eca; ?>
<?php unset($__attributesOriginal59c796603a9fe3a5632766e1b08f5eca); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal59c796603a9fe3a5632766e1b08f5eca)): ?>
<?php $component = $__componentOriginal59c796603a9fe3a5632766e1b08f5eca; ?>
<?php unset($__componentOriginal59c796603a9fe3a5632766e1b08f5eca); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php echo $__env->renderWhen(
                    $this->hasConfigurableAreaFor('before-tools'),
                    $this->getConfigurableAreaFor('before-tools'),
                    $this->getParametersForConfigurableArea('before-tools')
                , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

                <?php if($this->shouldShowTools): ?>
                    <?php if (isset($component)) { $__componentOriginalcfa5e916e9b847460b36731d72a5fad5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfa5e916e9b847460b36731d72a5fad5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                        <?php if($this->showSortPillsSection): ?>
                            <?php if (isset($component)) { $__componentOriginald6c7405a8448506bf87bd0cf28074c45 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald6c7405a8448506bf87bd0cf28074c45 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.sorting-pills','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.sorting-pills'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald6c7405a8448506bf87bd0cf28074c45)): ?>
<?php $attributes = $__attributesOriginald6c7405a8448506bf87bd0cf28074c45; ?>
<?php unset($__attributesOriginald6c7405a8448506bf87bd0cf28074c45); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald6c7405a8448506bf87bd0cf28074c45)): ?>
<?php $component = $__componentOriginald6c7405a8448506bf87bd0cf28074c45; ?>
<?php unset($__componentOriginald6c7405a8448506bf87bd0cf28074c45); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if($this->showFilterPillsSection): ?>
                            <?php if (isset($component)) { $__componentOriginal82226b2a23dd1f2f9156e9159f14502d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal82226b2a23dd1f2f9156e9159f14502d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.filter-pills','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.filter-pills'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal82226b2a23dd1f2f9156e9159f14502d)): ?>
<?php $attributes = $__attributesOriginal82226b2a23dd1f2f9156e9159f14502d; ?>
<?php unset($__attributesOriginal82226b2a23dd1f2f9156e9159f14502d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal82226b2a23dd1f2f9156e9159f14502d)): ?>
<?php $component = $__componentOriginal82226b2a23dd1f2f9156e9159f14502d; ?>
<?php unset($__componentOriginal82226b2a23dd1f2f9156e9159f14502d); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php echo $__env->renderWhen(
                            $this->hasConfigurableAreaFor('before-toolbar'),
                            $this->getConfigurableAreaFor('before-toolbar'),
                            $this->getParametersForConfigurableArea('before-toolbar')
                        , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

                        <?php if($this->shouldShowToolBar): ?>
                            <?php if (isset($component)) { $__componentOriginal1b8beec51ff458ad7bafe698e1404db3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1b8beec51ff458ad7bafe698e1404db3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.toolbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.toolbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1b8beec51ff458ad7bafe698e1404db3)): ?>
<?php $attributes = $__attributesOriginal1b8beec51ff458ad7bafe698e1404db3; ?>
<?php unset($__attributesOriginal1b8beec51ff458ad7bafe698e1404db3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1b8beec51ff458ad7bafe698e1404db3)): ?>
<?php $component = $__componentOriginal1b8beec51ff458ad7bafe698e1404db3; ?>
<?php unset($__componentOriginal1b8beec51ff458ad7bafe698e1404db3); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if(
                            $this->filtersAreEnabled() &&
                            $this->filtersVisibilityIsEnabled() &&
                            $this->hasVisibleFilters() &&
                            $this->isFilterLayoutSlideDown()
                        ): ?>
                            <?php if (isset($component)) { $__componentOriginal23ad44e4fef8ad273d667870094af139 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23ad44e4fef8ad273d667870094af139 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.tools.toolbar.items.filter-slidedown','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::tools.toolbar.items.filter-slidedown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23ad44e4fef8ad273d667870094af139)): ?>
<?php $attributes = $__attributesOriginal23ad44e4fef8ad273d667870094af139; ?>
<?php unset($__attributesOriginal23ad44e4fef8ad273d667870094af139); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23ad44e4fef8ad273d667870094af139)): ?>
<?php $component = $__componentOriginal23ad44e4fef8ad273d667870094af139; ?>
<?php unset($__componentOriginal23ad44e4fef8ad273d667870094af139); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php echo $__env->renderWhen(
                            $this->hasConfigurableAreaFor('after-toolbar'),
                            $this->getConfigurableAreaFor('after-toolbar'),
                            $this->getParametersForConfigurableArea('after-toolbar')
                        , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfa5e916e9b847460b36731d72a5fad5)): ?>
<?php $attributes = $__attributesOriginalcfa5e916e9b847460b36731d72a5fad5; ?>
<?php unset($__attributesOriginalcfa5e916e9b847460b36731d72a5fad5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfa5e916e9b847460b36731d72a5fad5)): ?>
<?php $component = $__componentOriginalcfa5e916e9b847460b36731d72a5fad5; ?>
<?php unset($__componentOriginalcfa5e916e9b847460b36731d72a5fad5); ?>
<?php endif; ?>
                <?php endif; ?>

                <?php echo $__env->renderWhen(
                    $this->hasConfigurableAreaFor('after-tools'),
                    $this->getConfigurableAreaFor('after-tools'),
                    $this->getParametersForConfigurableArea('after-tools')
                , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

                <?php if (isset($component)) { $__componentOriginal0020b201123718af7a3f5b0bf11bd43e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0020b201123718af7a3f5b0bf11bd43e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                     <?php $__env->slot('thead', null, []); ?> 
                        <?php if($this->getCurrentlyReorderingStatus): ?>
                            <?php if (isset($component)) { $__componentOriginal9e7af47e74fad6d28215193608757777 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9e7af47e74fad6d28215193608757777 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th.reorder','data' => ['xCloak' => true,'xShow' => 'currentlyReorderingStatus']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th.reorder'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'currentlyReorderingStatus']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9e7af47e74fad6d28215193608757777)): ?>
<?php $attributes = $__attributesOriginal9e7af47e74fad6d28215193608757777; ?>
<?php unset($__attributesOriginal9e7af47e74fad6d28215193608757777); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e7af47e74fad6d28215193608757777)): ?>
<?php $component = $__componentOriginal9e7af47e74fad6d28215193608757777; ?>
<?php unset($__componentOriginal9e7af47e74fad6d28215193608757777); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if($this->showBulkActionsSections): ?>
                            <?php if (isset($component)) { $__componentOriginal6c23d52fec8981c60aa8622a8cd9fa20 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6c23d52fec8981c60aa8622a8cd9fa20 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th.bulk-actions','data' => ['displayMinimisedOnReorder' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th.bulk-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6c23d52fec8981c60aa8622a8cd9fa20)): ?>
<?php $attributes = $__attributesOriginal6c23d52fec8981c60aa8622a8cd9fa20; ?>
<?php unset($__attributesOriginal6c23d52fec8981c60aa8622a8cd9fa20); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c23d52fec8981c60aa8622a8cd9fa20)): ?>
<?php $component = $__componentOriginal6c23d52fec8981c60aa8622a8cd9fa20; ?>
<?php unset($__componentOriginal6c23d52fec8981c60aa8622a8cd9fa20); ?>
<?php endif; ?>
                        <?php endif; ?>
                        <?php if($this->showCollapsingColumnSections): ?>
                            <?php if (isset($component)) { $__componentOriginale989ad67cabe713b9530a22e737ba864 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale989ad67cabe713b9530a22e737ba864 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th.collapsed-columns','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th.collapsed-columns'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale989ad67cabe713b9530a22e737ba864)): ?>
<?php $attributes = $__attributesOriginale989ad67cabe713b9530a22e737ba864; ?>
<?php unset($__attributesOriginale989ad67cabe713b9530a22e737ba864); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale989ad67cabe713b9530a22e737ba864)): ?>
<?php $component = $__componentOriginale989ad67cabe713b9530a22e737ba864; ?>
<?php unset($__componentOriginale989ad67cabe713b9530a22e737ba864); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php foreach ($this->selectedVisibleColumns as $index => $column): ?>
                            <?php if (isset($component)) { $__componentOriginal4cfdf9776407638acc4eb9180b3aebf0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4cfdf9776407638acc4eb9180b3aebf0 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.th','data' => ['wire:key' => ''.e($tableName.'-table-head-'.$index).'','column' => $column,'index' => $index]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName.'-table-head-'.$index).'','column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column),'index' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($index)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4cfdf9776407638acc4eb9180b3aebf0)): ?>
<?php $attributes = $__attributesOriginal4cfdf9776407638acc4eb9180b3aebf0; ?>
<?php unset($__attributesOriginal4cfdf9776407638acc4eb9180b3aebf0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4cfdf9776407638acc4eb9180b3aebf0)): ?>
<?php $component = $__componentOriginal4cfdf9776407638acc4eb9180b3aebf0; ?>
<?php unset($__componentOriginal4cfdf9776407638acc4eb9180b3aebf0); ?>
<?php endif; ?>
                        <?php endforeach; ?>
                     <?php $__env->endSlot(); ?>

                    <?php if($this->secondaryHeaderIsEnabled() && $this->hasColumnsWithSecondaryHeader()): ?>
                        <?php if (isset($component)) { $__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.secondary-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.secondary-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9)): ?>
<?php $attributes = $__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9; ?>
<?php unset($__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9)): ?>
<?php $component = $__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9; ?>
<?php unset($__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <?php if($this->hasDisplayLoadingPlaceholder()): ?>
                        <?php if (isset($component)) { $__componentOriginal11bfe799ec63f6a33fa35319c1c06283 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal11bfe799ec63f6a33fa35319c1c06283 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.includes.loading','data' => ['colCount' => ''.e($this->columns->count()+1).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::includes.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colCount' => ''.e($this->columns->count()+1).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal11bfe799ec63f6a33fa35319c1c06283)): ?>
<?php $attributes = $__attributesOriginal11bfe799ec63f6a33fa35319c1c06283; ?>
<?php unset($__attributesOriginal11bfe799ec63f6a33fa35319c1c06283); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal11bfe799ec63f6a33fa35319c1c06283)): ?>
<?php $component = $__componentOriginal11bfe799ec63f6a33fa35319c1c06283; ?>
<?php unset($__componentOriginal11bfe799ec63f6a33fa35319c1c06283); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if($this->showBulkActionsSections): ?>
                        <?php if (isset($component)) { $__componentOriginal2a6aed87ec754b8b2e2f3bfefadc6062 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2a6aed87ec754b8b2e2f3bfefadc6062 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.bulk-actions','data' => ['displayMinimisedOnReorder' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.bulk-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['displayMinimisedOnReorder' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2a6aed87ec754b8b2e2f3bfefadc6062)): ?>
<?php $attributes = $__attributesOriginal2a6aed87ec754b8b2e2f3bfefadc6062; ?>
<?php unset($__attributesOriginal2a6aed87ec754b8b2e2f3bfefadc6062); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2a6aed87ec754b8b2e2f3bfefadc6062)): ?>
<?php $component = $__componentOriginal2a6aed87ec754b8b2e2f3bfefadc6062; ?>
<?php unset($__componentOriginal2a6aed87ec754b8b2e2f3bfefadc6062); ?>
<?php endif; ?>
                    <?php endif; ?>
                    <?php if(count($currentRows = $this->getRows) > 0): ?>
                        <?php ($getCurrentlyReorderingStatus = $this->getCurrentlyReorderingStatus); ?>
                        <?php ($showBulkActionsSections = $this->showBulkActionsSections); ?>
                        <?php ($showCollapsingColumnSections = $this->showCollapsingColumnSections); ?>
                        <?php ($selectedVisibleColumns = $this->selectedVisibleColumns); ?>

                        <?php foreach ($currentRows as $rowIndex => $row): ?>
                            <?php if (isset($component)) { $__componentOriginalf6cda62209e2d28e1b6047e036ff6a98 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf6cda62209e2d28e1b6047e036ff6a98 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr','data' => ['wire:key' => ''.e($tableName).'-row-wrap-'.e($row->{$primaryKey}).'','row' => $row,'rowIndex' => $rowIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName).'-row-wrap-'.e($row->{$primaryKey}).'','row' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'rowIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rowIndex)]); ?>
                                <?php if($getCurrentlyReorderingStatus): ?>
                                    <?php if (isset($component)) { $__componentOriginalc301a6ca59a45ff777edce5720923597 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc301a6ca59a45ff777edce5720923597 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.reorder','data' => ['xCloak' => true,'xShow' => 'currentlyReorderingStatus','wire:key' => ''.e($tableName).'-row-reorder-'.e($row->{$primaryKey}).'','rowID' => $tableName.'-'.$row->{$this->getPrimaryKey()},'rowIndex' => $rowIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.reorder'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'x-show' => 'currentlyReorderingStatus','wire:key' => ''.e($tableName).'-row-reorder-'.e($row->{$primaryKey}).'','rowID' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tableName.'-'.$row->{$this->getPrimaryKey()}),'rowIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rowIndex)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc301a6ca59a45ff777edce5720923597)): ?>
<?php $attributes = $__attributesOriginalc301a6ca59a45ff777edce5720923597; ?>
<?php unset($__attributesOriginalc301a6ca59a45ff777edce5720923597); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc301a6ca59a45ff777edce5720923597)): ?>
<?php $component = $__componentOriginalc301a6ca59a45ff777edce5720923597; ?>
<?php unset($__componentOriginalc301a6ca59a45ff777edce5720923597); ?>
<?php endif; ?>
                                <?php endif; ?>
                                <?php if($showBulkActionsSections): ?>
                                    <?php if (isset($component)) { $__componentOriginal5efafa9b7342dbe33dbdd7e15d486152 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5efafa9b7342dbe33dbdd7e15d486152 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.bulk-actions','data' => ['wire:key' => ''.e($tableName).'-row-bulk-act-'.e($row->{$primaryKey}).'','row' => $row,'rowIndex' => $rowIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.bulk-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName).'-row-bulk-act-'.e($row->{$primaryKey}).'','row' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'rowIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rowIndex)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5efafa9b7342dbe33dbdd7e15d486152)): ?>
<?php $attributes = $__attributesOriginal5efafa9b7342dbe33dbdd7e15d486152; ?>
<?php unset($__attributesOriginal5efafa9b7342dbe33dbdd7e15d486152); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5efafa9b7342dbe33dbdd7e15d486152)): ?>
<?php $component = $__componentOriginal5efafa9b7342dbe33dbdd7e15d486152; ?>
<?php unset($__componentOriginal5efafa9b7342dbe33dbdd7e15d486152); ?>
<?php endif; ?>
                                <?php endif; ?>
                                <?php if($showCollapsingColumnSections): ?>
                                    <?php if (isset($component)) { $__componentOriginalcbcbb42cd972a80745673df94b41b917 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbcbb42cd972a80745673df94b41b917 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td.collapsed-columns','data' => ['wire:key' => ''.e($tableName).'-row-collapsed-'.e($row->{$primaryKey}).'','rowIndex' => $rowIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td.collapsed-columns'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName).'-row-collapsed-'.e($row->{$primaryKey}).'','rowIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rowIndex)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbcbb42cd972a80745673df94b41b917)): ?>
<?php $attributes = $__attributesOriginalcbcbb42cd972a80745673df94b41b917; ?>
<?php unset($__attributesOriginalcbcbb42cd972a80745673df94b41b917); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbcbb42cd972a80745673df94b41b917)): ?>
<?php $component = $__componentOriginalcbcbb42cd972a80745673df94b41b917; ?>
<?php unset($__componentOriginalcbcbb42cd972a80745673df94b41b917); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php foreach ($selectedVisibleColumns as $colIndex => $column): ?>
                                    <?php if (isset($component)) { $__componentOriginale615d352c7999b0bf2083caa58245294 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale615d352c7999b0bf2083caa58245294 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.td','data' => ['wire:key' => ''.e($tableName . '-' . $row->{$primaryKey} . '-datatable-td-' . $column->getSlug()).'','column' => $column,'colIndex' => $colIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:key' => ''.e($tableName . '-' . $row->{$primaryKey} . '-datatable-td-' . $column->getSlug()).'','column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column),'colIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colIndex)]); ?>
                                        <?php if($column->isHtml()): ?>
                                            <?php echo $column->setIndexes($rowIndex, $colIndex)->renderContents($row); ?>

                                        <?php else: ?>
                                            <?php echo e($column->setIndexes($rowIndex, $colIndex)->renderContents($row)); ?>

                                        <?php endif; ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale615d352c7999b0bf2083caa58245294)): ?>
<?php $attributes = $__attributesOriginale615d352c7999b0bf2083caa58245294; ?>
<?php unset($__attributesOriginale615d352c7999b0bf2083caa58245294); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale615d352c7999b0bf2083caa58245294)): ?>
<?php $component = $__componentOriginale615d352c7999b0bf2083caa58245294; ?>
<?php unset($__componentOriginale615d352c7999b0bf2083caa58245294); ?>
<?php endif; ?>
                                <?php endforeach; ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf6cda62209e2d28e1b6047e036ff6a98)): ?>
<?php $attributes = $__attributesOriginalf6cda62209e2d28e1b6047e036ff6a98; ?>
<?php unset($__attributesOriginalf6cda62209e2d28e1b6047e036ff6a98); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6cda62209e2d28e1b6047e036ff6a98)): ?>
<?php $component = $__componentOriginalf6cda62209e2d28e1b6047e036ff6a98; ?>
<?php unset($__componentOriginalf6cda62209e2d28e1b6047e036ff6a98); ?>
<?php endif; ?>

                            <?php if($showCollapsingColumnSections): ?>
                                <?php if (isset($component)) { $__componentOriginala0384d76f6c6ad31dd61c5b99520ab2a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0384d76f6c6ad31dd61c5b99520ab2a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.collapsed-columns','data' => ['row' => $row,'rowIndex' => $rowIndex]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.collapsed-columns'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['row' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($row),'rowIndex' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rowIndex)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0384d76f6c6ad31dd61c5b99520ab2a)): ?>
<?php $attributes = $__attributesOriginala0384d76f6c6ad31dd61c5b99520ab2a; ?>
<?php unset($__attributesOriginala0384d76f6c6ad31dd61c5b99520ab2a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0384d76f6c6ad31dd61c5b99520ab2a)): ?>
<?php $component = $__componentOriginala0384d76f6c6ad31dd61c5b99520ab2a; ?>
<?php unset($__componentOriginala0384d76f6c6ad31dd61c5b99520ab2a); ?>
<?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <?php if (isset($component)) { $__componentOriginal18adc8986e50e7923b3f129e9b0cc565 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18adc8986e50e7923b3f129e9b0cc565 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.empty','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.empty'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18adc8986e50e7923b3f129e9b0cc565)): ?>
<?php $attributes = $__attributesOriginal18adc8986e50e7923b3f129e9b0cc565; ?>
<?php unset($__attributesOriginal18adc8986e50e7923b3f129e9b0cc565); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18adc8986e50e7923b3f129e9b0cc565)): ?>
<?php $component = $__componentOriginal18adc8986e50e7923b3f129e9b0cc565; ?>
<?php unset($__componentOriginal18adc8986e50e7923b3f129e9b0cc565); ?>
<?php endif; ?>
                    <?php endif; ?>
                    

                    <?php if($this->footerIsEnabled() && $this->hasColumnsWithFooter()): ?>
                         <?php $__env->slot('tfoot', null, []); ?> 
                            <?php if($this->useHeaderAsFooterIsEnabled()): ?>
                                <?php if (isset($component)) { $__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.secondary-header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.secondary-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9)): ?>
<?php $attributes = $__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9; ?>
<?php unset($__attributesOriginal8b64a94126bc3b7d3c1391dfafa7b4a9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9)): ?>
<?php $component = $__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9; ?>
<?php unset($__componentOriginal8b64a94126bc3b7d3c1391dfafa7b4a9); ?>
<?php endif; ?>
                            <?php else: ?>
                                <?php if (isset($component)) { $__componentOriginalcd266370bcad8e702acb82b2e44a2663 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd266370bcad8e702acb82b2e44a2663 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.table.tr.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::table.tr.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd266370bcad8e702acb82b2e44a2663)): ?>
<?php $attributes = $__attributesOriginalcd266370bcad8e702acb82b2e44a2663; ?>
<?php unset($__attributesOriginalcd266370bcad8e702acb82b2e44a2663); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd266370bcad8e702acb82b2e44a2663)): ?>
<?php $component = $__componentOriginalcd266370bcad8e702acb82b2e44a2663; ?>
<?php unset($__componentOriginalcd266370bcad8e702acb82b2e44a2663); ?>
<?php endif; ?>
                            <?php endif; ?>
                         <?php $__env->endSlot(); ?>
                    <?php endif; ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0020b201123718af7a3f5b0bf11bd43e)): ?>
<?php $attributes = $__attributesOriginal0020b201123718af7a3f5b0bf11bd43e; ?>
<?php unset($__attributesOriginal0020b201123718af7a3f5b0bf11bd43e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0020b201123718af7a3f5b0bf11bd43e)): ?>
<?php $component = $__componentOriginal0020b201123718af7a3f5b0bf11bd43e; ?>
<?php unset($__componentOriginal0020b201123718af7a3f5b0bf11bd43e); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal9914a0280e3e8f4d0a91254c353b67a8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9914a0280e3e8f4d0a91254c353b67a8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-tables::components.pagination','data' => ['currentRows' => $currentRows]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-tables::pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['currentRows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($currentRows)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9914a0280e3e8f4d0a91254c353b67a8)): ?>
<?php $attributes = $__attributesOriginal9914a0280e3e8f4d0a91254c353b67a8; ?>
<?php unset($__attributesOriginal9914a0280e3e8f4d0a91254c353b67a8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9914a0280e3e8f4d0a91254c353b67a8)): ?>
<?php $component = $__componentOriginal9914a0280e3e8f4d0a91254c353b67a8; ?>
<?php unset($__componentOriginal9914a0280e3e8f4d0a91254c353b67a8); ?>
<?php endif; ?>

                <?php if ($__env->exists($customView)) echo $__env->make($customView, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5dab5ce914f340564fc175ce94266c7)): ?>
<?php $attributes = $__attributesOriginalb5dab5ce914f340564fc175ce94266c7; ?>
<?php unset($__attributesOriginalb5dab5ce914f340564fc175ce94266c7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5dab5ce914f340564fc175ce94266c7)): ?>
<?php $component = $__componentOriginalb5dab5ce914f340564fc175ce94266c7; ?>
<?php unset($__componentOriginalb5dab5ce914f340564fc175ce94266c7); ?>
<?php endif; ?>

            <?php echo $__env->renderWhen(
                $this->hasConfigurableAreaFor('after-wrapper'),
                $this->getConfigurableAreaFor('after-wrapper'),
                $this->getParametersForConfigurableArea('after-wrapper')
            , array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1])); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\vendor\rappasoft\laravel-livewire-tables\resources\views\datatable.blade.php ENDPATH**/ ?>