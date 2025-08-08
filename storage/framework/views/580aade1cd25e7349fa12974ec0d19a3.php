<div>
    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $usuario->contratos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <span class="block"><?php echo e($contrato->nombre); ?></span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <span>Sin contrato</span>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/livewire/datatable/contratos.blade.php ENDPATH**/ ?>