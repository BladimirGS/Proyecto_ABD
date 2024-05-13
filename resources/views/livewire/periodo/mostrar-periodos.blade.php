<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Periodos</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 text-center">
                <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold">Buscar y Filtrar Periodos</h2>

                <livewire:buscador evento="buscar-periodo" />

                <x-button
                    wire:click="$dispatch('openModal', { component: 'periodo.crear-periodo' })"
                >Registrar Periodo</x-button>
            </div>

            <div class=" md:w-2/3 mx-auto bg-white shadow-sm sm:rounded-lg overflow-x-scroll sm:overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="Nombre" />
                            <x-table-header value="Fecha Inicio" />
                            <x-table-header value="Fecha Fin" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($periodos as $periodo)
                        <tr>
                            <x-table-cell>{{ $periodo->nombre ?? '' }}</x-table-cell>
                            <x-table-cell value="{{ $periodo->fecha_inicio }}" />
                            <x-table-cell value="{{ $periodo->fecha_fin }}" />
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-button 
                                        wire:click="$dispatch('openModal', { component: 'periodo.editar-periodo', arguments: { periodo: {{ $periodo->id }} }})"
                                        color="blue"
                                    >Editar</x-button>

                                    <x-button
                                        wire:click="$dispatch('eliminar-periodo', { id: {{ $periodo->id }} })"
                                        color="red"
                                    >Eliminar</x-button>
                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay periodos</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10">
                {{ $periodos->links() }}
            </div>
        </div>
    </div>
</div>
