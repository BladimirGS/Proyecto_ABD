<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? 'Nombre Desconocido') }}
    </h1>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <div class="bg-white shadow-sm sm:rounded-lg py-10 px-8 md:px-20 mx-auto">
                <div class="mb-4 space-y-4">
                    <h1 class="text-2xl font-bold">{{ $actividad->nombre }}</h1>

                    <p class="text-base text-gray-600 font-medium whitespace-pre-line break-normal">{{ $actividad->descripcion }}</p>

                    <h2 class="text-lg font-bold">Fecha programada:
                        <x-formato-fecha fechaformateada="{{ $actividad->fecha }}"></x-formato-fecha>
                    </span></h2>
                </div>
        
                <!-- Tabla con información de la actividad -->
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
                                    {{ $archivoExistente ? $archivoExistente->fecha : '-' }}
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Archivo</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivoExistente)
                                    <x-truncade>
                                        <a href="{{ route('verArchivo', ['archivo' => $archivoExistente->id, 'nombre' => $archivoExistente->nombre]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate  active:text-red-600">
                                            {{ $archivoExistente->nombre }}
                                        </a>
                                        </x-truncade>
                                    @else
                                        Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400 font-semibold" colspan="2">
                                    <label class="font-bold mb-2">Comentario :</label>

                                    @if ($comentario)
                                    <x-formato-fecha fechaformateada="{{ $comentario->fecha }}"></x-formato-fecha>
                                    @endif
                                    <div class="mb-4">
                                        @if ($comentario)
                                            <p class="whitespace-pre-line">{{ $comentario->comentario }}</p>
                                        @else
                                            <p>No hay comentarios</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($actividad->activo)
                    <div class="text-center">
                        <form action="{{ route('docente.grupo.actividades.subir', ['grupo' => $grupo->id, 'actividad' => $actividad->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <livewire:dropzone
                                {{-- El name interno es name="archivo" --}}
                                :rules="['file','extensions:pdf,doc,docx','max:20840']"
                                :multiple="false" 
                            />
                
                            <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
                                
                            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                                <x-link href="{{ route('docente.grupo.actividades.index', $grupo->id) }}" color="red" class="w-full md:w-auto">
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
            @if(session('status'))
            Livewire.dispatch('exito');
            @endif
        });
    </script>
@endpush
</x-app-layout>


