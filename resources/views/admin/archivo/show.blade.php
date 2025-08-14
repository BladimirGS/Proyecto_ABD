<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupoUser->grupo->clave . " - " . ($grupoUser->grupo->materia->nombre ?? '') }}
    </h1>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <div class="bg-white shadow-sm sm:rounded-lg py-10 px-8 md:px-20 mx-auto">
                <div class="mb-4 space-y-4">
                    <h1 class="text-2xl font-bold">{{ $actividad->nombre }}</h1>

                    <p class="text-base text-gray-600 font-medium whitespace-pre-line break-normal">{{
                        $actividad->descripcion }}
                    </p>

                    <h2 class="text-lg font-bold">
                        Fecha programada:
                        {{ $actividad->fecha?->translatedFormat('d \d\e F \d\e Y') }}
                    </h2>
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
                                        <a href="{{ route('verArchivo', ['archivo' => $archivo->id, 'nombre' => $archivo->nombre]) }}"
                                            target="_blank"
                                            class="text-indigo-600 hover:text-indigo-700 focus:text-red-600 truncate  active:text-red-600">
                                            {{ $archivo->nombre }}
                                        </a>
                                    </x-truncade>
                                    @else
                                    Actividad no completada
                                    @endif
                                </x-table-cell>
                            </tr>

                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-700 border border-gray-400 font-semibold"
                                    colspan="2">
                                    <label class="font-bold block mb-2">Comentario</label>

                                    @if ($comentario)
                                    <div class="bg-gray-50 border border-gray-300 rounded-md p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <p class="text-gray-800">
                                                {{ $comentario->comentario }}
                                            </p>

                                            <form action="{{ route('comentarios.destroy', $comentario->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="eliminar-comentario" type="button"
                                                    class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>

                                        <span class="text-sm text-gray-500">
                                            Publicado {{ $comentario->fecha?->diffForHumans() }}
                                            ({{ $comentario->fecha?->translatedFormat('d \d\e F \d\e Y') }})
                                        </span>
                                    </div>
                                    @endif

                                    <form action="{{ route('archivos.evaluar', ['archivo' => $archivo->id]) }}"
                                        method="POST">
                                        @csrf
                                        <textarea name="comentario" class="w-full mt-2 border rounded"></textarea>

                                        <x-input-error :messages="$errors->get('comentario')" class="mt-2" />

                                        <div class="mt-4">
                                            <label class="font-bold">Estado:</label>
                                            <div class="flex items-center space-x-4 mt-2">
                                                @foreach (['Aprobado', 'Rechazado'] as $estado)
                                                <label class="flex items-center">
                                                    <input type="radio" name="estado" value="{{ $estado }}" {{
                                                        $archivo->estado === $estado ? 'checked' : '' }} class="mr-2">
                                                    {{ $estado }}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                                            <x-link href="{{ route('archivos.index') }}" color="red"
                                                class="w-full md:w-auto">
                                                atras
                                            </x-link>

                                            <x-button type="submit" class="w-full md:w-auto">Guardar evaluación
                                            </x-button>
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
            const Comentario = document.getElementById("eliminar-comentario");
            
                Comentario.addEventListener('click', function () {
                    Swal.fire({
                        title: '¿Eliminar comentario?',
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