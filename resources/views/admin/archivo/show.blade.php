<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? '') }}
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
                                    @if ($archivo)
                                        Actividad completada
                                    @else
                                        Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Estatus de revisión</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivo)
                                        {{$archivo->estado}}
                                    @else
                                        Actividad no completada
                                    @endif
                                </x-table-cell>                                
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Última modificación</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    {{ $archivo && $archivo->fecha ? $archivo->fecha->diffForHumans() : '-' }}
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Archivo</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivo)
                                    <x-truncade>
                                        <a href="{{ route('verArchivo', ['archivo' => $archivo->id, 'nombre' => $archivo->nombre]) }}" target="_blank" class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate  active:text-red-600">
                                            {{ $archivo->nombre }}
                                        </a>
                                        </x-truncade>
                                    @else
                                        Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>
                            
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400 font-semibold" colspan="2">
                                    <form action="{{ route('archivos.evaluar', ['archivo' => $archivo->id]) }}" method="POST">
                                        @csrf
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
                                    
                                        <textarea name="comentario" class="w-full mt-2 border rounded"></textarea>
                                        
                                        <x-input-error :messages="$errors->get('comentario')" class="mt-2" />

                                        <!-- Opciones de Estado -->
                                        <div class="mt-4">
                                            <label class="font-bold">Estado:</label>
                                            <div class="flex items-center space-x-4 mt-2">
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Aprobado" 
                                                        {{ $archivo->estado === 'Aprobado' ? 'checked' : '' }} class="mr-2">
                                                    Aprobado
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Rechazado" 
                                                        {{ $archivo->estado === 'Rechazado' ? 'checked' : '' }} class="mr-2">
                                                    Rechazado
                                                </label>
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="Pendiente" 
                                                        {{ $archivo->estado === 'Pendiente' ? 'checked' : '' }} class="mr-2">
                                                    Pendiente
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                                            <x-link href="{{ route('archivos.index') }}" color="red" class="w-full md:w-auto">
                                                atras
                                            </x-link>

                                            <x-button type="submit" class="w-full md:w-auto">Guardar evaluación</x-button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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


