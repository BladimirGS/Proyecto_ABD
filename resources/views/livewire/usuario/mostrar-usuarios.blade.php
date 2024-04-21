<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <livewire:usuario.filtrar-usuarios />

                <button
                    wire:click="$dispatch('openModal', { component: 'usuario.crear-usuario' })"
                    class="bg-gray-800 py-2 px-4 ml-6 mb-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >Registrar Usuario</button>


                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Nombre</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Apellido</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">RFC</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Tipo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider">Email</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Editar/Eliminar</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($usuarios as $usuario)
                            <tr>
                                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700">{{ $usuario->nombre }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700">{{ $usuario->apellido }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700">{{ $usuario->rfc }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700">{{ $usuario->tipo }}</td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap font-medium text-gray-700">{{ $usuario->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-between">
                                        <button
                                            wire:click="$dispatch('openModal', { component: 'usuario.editar-usuario', arguments: { usuario: {{ $usuario->id }} }})"
                                            class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                                        >Editar</button>

                                        <button
                                            wire:click="$dispatch('eliminar-usuario', { id: {{ $usuario->id }} })"
                                            class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                                        >Eliminar</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" colspan="6">No hay usuarios</td>
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
</div>
