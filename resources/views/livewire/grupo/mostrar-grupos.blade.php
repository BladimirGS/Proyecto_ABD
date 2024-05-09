<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Grupos</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 text-center md:text-left">
                <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold">Buscar y Filtrar Grupos</h2>

                <livewire:buscador evento="buscar-grupo" />

                <a 
                    href="{{ route('grupos.create') }}"
                    class="px-4 py-2 text-white rounded-md font-semibold text-xs uppercase tracking-widest border border-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900"
                >Registrar Grupo</a>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-scroll 2xl:overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="Clave" />
                            <x-table-header value="Docente" />
                            <x-table-header value="Carrera" />
                            <x-table-header value="Materia" />
                            <x-table-header value="periodo" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($grupos as $grupo)
                        <tr>
                            <x-table-cell value="{{ $grupo->clave }}" />
                            <x-table-cell value="{{ $grupo->user->nombre }}" />
                            <x-table-cell value="{{ $grupo->carrera->nombre }}" />
                            <x-table-cell value="{{ $grupo->materia->nombre }}" />
                            <x-table-cell>{{ $grupo->periodo->nombre }}</x-table-cell>
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-button 
                                        wire:click="$dispatch('openModal', { component: 'grupo.editar-grupo', arguments: { grupo: {{ $grupo->id }} }})"
                                        color="blue"
                                    >Editar</x-button>

                                    <x-button
                                        wire:click="$dispatch('eliminar-grupo', { id: {{ $grupo->id }} })"
                                        color="red"
                                    >Eliminar</x-button>
                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay grupos</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10">
                {{ $grupos->links() }}
            </div>
        </div>
    </div>
</div>
