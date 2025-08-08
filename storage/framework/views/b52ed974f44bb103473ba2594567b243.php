<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de actividades
    </h1>
    
    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <?php if (isset($component)) { $__componentOriginal6912374916afbfe53350098c2f0b0678 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6912374916afbfe53350098c2f0b0678 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-status','data' => ['status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6912374916afbfe53350098c2f0b0678)): ?>
<?php $attributes = $__attributesOriginal6912374916afbfe53350098c2f0b0678; ?>
<?php unset($__attributesOriginal6912374916afbfe53350098c2f0b0678); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6912374916afbfe53350098c2f0b0678)): ?>
<?php $component = $__componentOriginal6912374916afbfe53350098c2f0b0678; ?>
<?php unset($__componentOriginal6912374916afbfe53350098c2f0b0678); ?>
<?php endif; ?>

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('Datatable.actividad-datatable', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2210051068-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar actividad?',
                    text: "Una actividad eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'btn-confirm',
                        cancelButton: 'btn-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-actividad', id);
                        
                        Livewire.dispatch('exito');
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/admin/actividad/index.blade.php ENDPATH**/ ?>