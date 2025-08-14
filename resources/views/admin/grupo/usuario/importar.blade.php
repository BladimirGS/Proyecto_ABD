<x-app-layout>
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

            @if ($ultimoPeriodo)
            <div class="mb-4 p-4 bg-indigo-50 border-l-4 border-indigo-500 text-indigo-700 rounded">
                <strong>Periodo actual:</strong> {{ $ultimoPeriodo->nombre }}
            </div>
            @endif

            {{-- FORMULARIO CENTRADO --}}
            <div class="flex justify-center">
                <form action="{{ route('grupos.usuarios.importarExcel') }}" method="POST" enctype="multipart/form-data"
                    class="w-full max-w-2xl">
                    @csrf
                    <livewire:dropzone :rules="['file', 'mimes:xlsx,xls', 'max:10240']" :multiple="false" />
                    <x-input-error :messages="$errors->get('archivo')" class="mt-2" />

                    <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                        <x-link href="{{ route('grupos.usuarios.index') }}" color="red" class="w-full md:w-auto">
                            Cancelar
                        </x-link>

                        <x-button type="submit" class="w-full md:w-auto">
                            Subir Archivo
                        </x-button>
                    </div>
                </form>
            </div>

            @if ($errors->has('excel'))
            <div id="errores-excel" class="mt-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                <strong>Errores detectados en el archivo Excel:</strong>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->get('excel') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('status'))
                Livewire.dispatch('exito');
            @endif

            @if(session('errores_excel'))
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
            @endif
        });
    </script>
    @endpush
</x-app-layout>
