<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">archivos</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            {{-- <div class="mb-4 text-center md:text-left">
                <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold">Buscar y Filtrar archivos</h2>

                <livewire:buscador evento="buscar-archivo" />

                <a 
                    href="{{ route('archivos.create') }}"
                    class="px-4 py-2 text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900"
                >Registrar archivo</a>
            </div> --}}

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-scroll 2xl:overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="grupo" />
                            <x-table-header value="Docente" />
                            <x-table-header value="Archivo" />
                            <x-table-header value="Actividad" />
                            <x-table-header value="Estado" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($archivos as $archivo)
                        <tr>
                            <x-table-cell value="{{ $archivo->grupo->clave }}" />
                            <x-table-cell value="{{ $archivo->grupo->user->nombre }}" />
                            <x-table-cell value="{{ $archivo->nombre }}" />
                            <x-table-cell value="{{ $archivo->activity->nombre }}" />
                            <x-table-cell value="{{ $archivo->status ?? 'pendiente' }}" />
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-button
                                        wire:click="approve({{ $archivo }})"
                                        color="violet"
                                    >Aprobar</x-button>

                                    <x-button
                                        wire:click="disapproved({{ $archivo }})"
                                        color="blue"
                                    >Descartar</x-button>

                                    <x-button
                                        wire:click="download({{ $archivo }})"
                                        color="red"
                                    >Descargar</x-button>
                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay archivos</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10">
                {{ $archivos->links() }}
            </div>
        </div>
    </div>
</div>
