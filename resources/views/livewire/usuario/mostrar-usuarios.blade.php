<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Usuarios</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 text-center md:text-left">
                <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold">Buscar y Filtrar Usuarios</h2>

                <livewire:buscador evento="buscar-usuario" />

                <x-button
                    wire:click="$dispatch('openModal', { component: 'usuario.crear-usuario' })"
                >Registrar Usuario</x-button>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-x-scroll 2xl:overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="Nombre" />
                            <x-table-header value="Apellido" />
                            <x-table-header value="RFC" />
                            <x-table-header value="Tipo" />
                            <x-table-header value="Email" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($usuarios as $usuario)
                        <tr>
                            <x-table-cell value="{{ $usuario->nombre }}" />
                            <x-table-cell value="{{ $usuario->apellido }}" />
                            <x-table-cell value="{{ $usuario->rfc }}" />
                                <x-table-cell> 
                                    @forelse ($usuario->contratos as $contrato)
                                        <span class="block">{{ $contrato->nombre }}</span>
                                    @empty
                                        <span>Sin contrato</span>
                                    @endforelse
                                </x-table-cell> 
                            <x-table-cell value="{{ $usuario->email }}" />
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-button 
                                        wire:click="$dispatch('openModal', { component: 'usuario.editar-usuario', arguments: { usuario: {{ $usuario->id }} }})"
                                        color="blue"
                                    >Editar</x-button>

                                    <x-button
                                        wire:click="$dispatch('eliminar-usuario', { id: {{ $usuario->id }} })"
                                        color="red"
                                    >Eliminar</x-button>
                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay usuarios</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-10">
                {{ $usuarios->links() }}
            </div>
        </div>
    </div>
</div>
