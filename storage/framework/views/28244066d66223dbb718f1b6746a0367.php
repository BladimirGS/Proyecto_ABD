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
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-center text-indigo-700 uppercase mb-4">
            Importar Grupos a Docentes
        </h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">
                📄 Instrucciones para subir el archivo Excel
            </h2>

            <ul class="list-disc list-inside text-gray-700 space-y-2 mb-6">
                <li class="list-none">El archivo debe ser un Excel con extensión <code>.xlsx</code>.</li>
                <li class="list-none">Asegúrate de usar <strong>correctamente</strong> el nombre del docente, la clave
                    del grupo y el nombre de la materia según están en el sistema.</li>
                <li class="list-none">Evita duplicar registros (el sistema ya lo validará).</li>
                <li class="list-none">Solo se necesita una hoja en el archivo.</li>
                <li class="list-none">Formato esperado del Excel:</li>
            </ul>

            <div class="overflow-auto mb-8">
                <table class="min-w-full bg-gray-100 text-sm text-left rounded-lg">
                    <thead class="bg-indigo-600 text-white">
                        <tr>
                            <th class="px-4 py-2">Grupo</th>
                            <th class="px-4 py-2">Materia</th>
                            <th class="px-4 py-2">Docente</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <tr class="border-t">
                            <td class="px-4 py-2">4SA</td>
                            <td class="px-4 py-2">TALLER DE INVESTIGACION</td>
                            <td class="px-4 py-2">JUAN CARLOS</td>
                        </tr>
                        <tr class="border-t">
                            <td class="px-4 py-2">5CB</td>
                            <td class="px-4 py-2">CONTABILIDAD</td>
                            <td class="px-4 py-2">JOSE MANUEL</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php if($ultimoPeriodo): ?>
            <div class="mb-4 p-4 bg-indigo-50 border-l-4 border-indigo-500 text-indigo-700 rounded">
                <strong>Periodo actual:</strong> <?php echo e($ultimoPeriodo->nombre); ?>

            </div>
            <?php endif; ?>

            
            <div class="flex justify-center">
                <form action="<?php echo e(route('grupos.usuarios.importarExcel')); ?>" method="POST" enctype="multipart/form-data"
                    class="w-full max-w-2xl">
                    <?php echo csrf_field(); ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dropzone', ['rules' => ['file', 'mimes:xlsx,xls', 'max:10240'],'multiple' => false]);

$__html = app('livewire')->mount($__name, $__params, 'lw-2129499182-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('archivo'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('archivo')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>

                    <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                        <?php if (isset($component)) { $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.link','data' => ['href' => ''.e(route('grupos.usuarios.index')).'','color' => 'red','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('grupos.usuarios.index')).'','color' => 'red','class' => 'w-full md:w-auto']); ?>
                            Cancelar
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $attributes = $__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__attributesOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b)): ?>
<?php $component = $__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b; ?>
<?php unset($__componentOriginal90eee3f94ef0e1b15e49c277c8700e9b); ?>
<?php endif; ?>

                        <?php if (isset($component)) { $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.button','data' => ['type' => 'submit','class' => 'w-full md:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full md:w-auto']); ?>
                            Subir Archivo
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $attributes = $__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__attributesOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561)): ?>
<?php $component = $__componentOriginald0f1fd2689e4bb7060122a5b91fe8561; ?>
<?php unset($__componentOriginald0f1fd2689e4bb7060122a5b91fe8561); ?>
<?php endif; ?>
                    </div>
                </form>
            </div>

            <?php if($errors->has('excel')): ?>
            <div id="errores-excel" class="mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                <strong>Errores detectados en el archivo Excel:</strong>
                <ul class="list-disc list-inside mt-2">
                    <?php $__currentLoopData = $errors->get('excel'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if(session('status')): ?>
                Swal.fire({
                    title: "Importación Exitosa",
                    text: "Los registros se han procesado correctamente.",
                    icon: "success",
                    confirmButtonColor: '#6366F1',
                    confirmButtonText: 'Ok'
                });
            <?php endif; ?>

            <?php if(session('errores_excel')): ?>
                Swal.fire({
                    title: "Errores en la Importación",
                    html: `<p>Se detectaron problemas en el archivo.</p>
                        <p class="mt-2"><strong>💡 Los detalles completos están más abajo en la página.</strong></p>`,
                    icon: "error",
                    confirmButtonColor: '#dc2626',
                    confirmButtonText: 'Ver detalles',
                    customClass: {
                        confirmButton: 'btn-ok',
                    }
                }).then(() => {
                    const erroresDiv = document.getElementById('errores-excel');
                    if (erroresDiv) {
                        erroresDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                });
            <?php endif; ?>
        });
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
<?php endif; ?><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views/admin/grupo/usuario/importar.blade.php ENDPATH**/ ?>