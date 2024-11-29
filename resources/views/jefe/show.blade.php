<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">
            {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? 'Nombre Desconocido') }}
        </h2>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <!-- Mensaje de estado -->
            <x-session-status :status="session('status')" />
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
                                    {{ $archivo ? $archivo->fecha : '-' }}
                                </x-table-cell>
                            </tr>
                            <tr>
                                <x-table-cell class="font-bold">Archivo</x-table-cell>
                                <x-table-cell class="font-semibold">
                                    @if ($archivo)
                                    <x-truncade>
                                        <a href="{{ route('docente.grupo.actividades.descargar', ['grupo' => $grupo->id, 'actividad' => $actividad->id, 'archivo' => $archivo->id]) }}" class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate  active:text-red-600">
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
                                        
                                        <x-button type="submit" class="block mt-4">Guardar</x-button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <form action="{{ route('docente.grupo.actividades.subir', ['grupo' => $grupo->id, 'actividad' => $actividad->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <livewire:dropzone
                            {{-- El name interno es name="archivo" --}}
                            :rules="['file','extensions:pdf,doc,docx','max:20840']"
                            :multiple="false" 
                        />
            
                        <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
                            
                        <x-button class="mt-8" type="submit">Subir</x-button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

