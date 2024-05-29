<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Grupos</h2>
    </x-slot>

    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 mx-auto">
            <div class="bg-white shadow-sm sm:rounded-lg py-10 px-8 md:px-20 mx-auto">
                <div class="mb-4 space-y-4">
                    <h1 class="text-2xl font-bold">{{ $actividad->nombre }}</h1>
                    <h2 class="text-lg font-bold">Fecha programada: <span class="font-semibold">{{ $actividad->fecha }}</span></h2>
                </div>
        
                <!-- Tabla con información de la actividad -->
                <div class="mb-8">
                    <table class="w-full table-auto border-collapse border border-gray-400 mx-auto">
                        <tbody>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 font-bold">Estatus de la entrega</td>
                                <td class="border border-gray-400 px-4 py-2">
                                    @if ($archivoExistente)
                                        Actividad completada
                                    @else
                                        Actividad no completada
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 font-bold">Estatus de revisión</td>
                                <td class="border border-gray-400 px-4 py-2">
                                    @if ($archivoExistente)
                                        {{$archivoExistente->estado}}
                                    @else
                                        Actividad no completada
                                    @endif
                                </td>                                
                            </tr>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 font-bold">Última modificación</td>
                                <x-table-cell>
                                    {{ $archivoExistente ? $archivoExistente->fecha : '-' }}
                                </x-table-cell>
                            </tr>
                            <tr>
                                <td class="border border-gray-400 px-4 py-2 font-bold">Archivo</td>
                                <td class="border border-gray-400 px-4 py-2">
                                    @if ($archivoExistente)
                                        <livewire:descargas wire:click="$commit" :archivoExistente="$archivoExistente">
                                    @else
                                        Actividad no completada
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="text-center">
                    <form wire:submit="submit"> 
                        <livewire:dropzone
                            wire:model="files"
                            :rules="['file','extensions:pdf','max:20840']"
                            :multiple="false" 
                        />

                        <x-input-error :messages="$errors->get('files')" class="mt-2" />
                            
                        <x-button class="mt-8" type="submit">Submit</x-button>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('archivosSubidos', (usuarioId) => {
            Swal.fire({
            title: "Buen trabajo!",
            icon: "success"
            });
        })
    </script>

@endpush
</div>

