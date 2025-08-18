<x-app-layout :breadcrumbs="$breadcrumbs">
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupoUser->grupo->clave }} - {{ $grupoUser->grupo->materia->nombre ?? "Desconocido" }}
    </h1>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <div class="bg-white shadow-sm sm:rounded-lg py-10 px-8 md:px-20 mx-auto">
                <div class="mb-4 space-y-4">
                    <h1 class="text-2xl font-bold">{{ $actividad->nombre }}</h1>

                    <p class="text-base text-gray-600 font-medium whitespace-pre-line break-normal">{{
                        $actividad->descripcion }}</p>

                    <h2 class="text-lg font-bold">
                        Fecha programada:
                        {{ $actividad->fecha?->translatedFormat('d \d\e F \d\e Y') }}
                    </h2>
                </div>

                @if (session('error-eliminar'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error: </strong>
                    <span class="block sm:inline">{{ session('error-eliminar') }}</span>
                </div>
                @endif

                <div class="mb-8 overflow-x-auto">
                    <table class="w-full table-auto border border-collapse border-gray-400 mx-auto">
                        <tbody>
                            <tr>
                                <x-table-cell class="font-bold">Estatus de la entrega</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivoExistente)
                                    Actividad completada
                                    @else
                                    Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Estatus de revisión</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivoExistente)
                                    {{$archivoExistente->estado}}
                                    @else
                                    Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Última modificación</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    {{ $archivoExistente && $archivoExistente->fecha ?
                                    $archivoExistente->fecha->diffForHumans() : '-' }}
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Archivo</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivoExistente)
                                    <div class="flex items-center justify-between space-x-4">
                                        <x-truncade class="flex-1">
                                            <a href="{{ route('verArchivo', ['archivo' => $archivoExistente->id, 'nombre' => $archivoExistente->nombre]) }}"
                                                target="_blank"
                                                class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate active:text-red-600">
                                                {{ $archivoExistente->nombre }}
                                            </a>
                                        </x-truncade>
                                        @if($actividad->activo)
                                        <form
                                            action="{{ route('archivos.destroy', ['archivo' => $archivoExistente->id, 'redirectUrl' => route('docente.grupo.actividades.show', ['grupoUser' => $archivoExistente->grupoUser->grupo_id, 'actividad' => $archivoExistente->actividad_id])]) }}"
                                            method="POST" class="flex-shrink-0">
                                            @csrf
                                            @method('DELETE')
                                            <button id="eliminar-archivo" type=" button"
                                                class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                                Eliminar
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                    @else
                                    <span class="text-gray-500 italic">Actividad no completada</span>
                                    @endif
                                </x-table-cell>
                            </tr>

                            @if ($actividad->firma == true)
                            <tr>
                                <x-table-cell class="font-bold">Archivo Firmado</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivoFirmado)
                                    <x-truncade class="flex-1">
                                        <a href="{{ route('verArchivo', ['archivo' => $archivoFirmado->id, 'nombre' => $archivoFirmado->nombre]) }}"
                                            target="_blank"
                                            class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate active:text-red-600">
                                            {{ $archivoFirmado->nombre }}
                                        </a>
                                    </x-truncade>
                                    @else
                                    <span class="text-gray-500 italic">Actividad no firmada</span>
                                    @endif
                                </x-table-cell>
                            </tr>
                            @endif
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400 font-semibold"
                                    colspan="2">
                                    <label class="font-bold block mb-2">Comentario:</label>

                                    @if ($comentario)
                                    <div class="bg-gray-50 border border-gray-300 rounded-md p-4">
                                        <p class="text-gray-800 whitespace-pre-line">
                                            {{ $comentario->comentario }}
                                        </p>
                                        <span class="text-sm text-gray-500">
                                            Publicado {{ $comentario->fecha?->diffForHumans() }}
                                            ({{ $comentario->fecha?->translatedFormat('d \d\e F \d\e Y') }})
                                        </span>
                                    </div>
                                    @else
                                    <p class="text-gray-500 italic">No hay comentarios</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($actividad->activo)
                <div class="text-center">
                    <form
                        action="{{ route('docente.grupo.actividades.subir', ['grupoUser' => $grupoUser->id, 'actividad' => $actividad->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <livewire:dropzone {{-- El name interno es name="archivo" --}}
                            :rules="['file','extensions:pdf,doc,docx','max:20840']" :multiple="false" />

                        <x-input-error :messages="$errors->get('archivo')" class="mt-2" />

                        <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                            <x-link href="{{ route('docente.grupo.actividades.index', $grupoUser->id) }}" color="red"
                                class="w-full md:w-auto">
                                Cancelar
                            </x-link>

                            <x-button type="submit" class="w-full md:w-auto">Subir Archivo</x-button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const archivo = document.getElementById("eliminar-archivo");

            archivo.addEventListener('click', function () {
                Swal.fire({
                    title: '¿Eliminar archivo?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'btn-confirm',
                        cancelButton: 'btn-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });

            @if(session('status'))
            Livewire.dispatch('exito');
            @endif
        });
    </script>
    @endpush
</x-app-layout>