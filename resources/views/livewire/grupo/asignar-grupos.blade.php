<div>
    <div class="md:flex md:justify-center p-5 bg-white rounded-lg shadow">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3">
            ✖
        </button>

        <form class="md:w-full lg:w-3/4" wire:submit.prevent="actualizarGrupos">
            @csrf

            <h2 class="block font-bold text-lg text-gray-700 text-center mb-4">Asignar Grupos</h2>

            <div class="mt-5">
                <x-input-label value="Nombre del Usuario" />
                <p class="text-gray-800 border border-gray-300 rounded-md p-2">{{ $usuario->nombre . ' ' .
                    $usuario->apellido }}</p>
            </div>

            <!-- Selección de Periodo -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">Seleccionar Periodo</label>
                <select wire:model="periodoSeleccionado" wire:change="actualizarPeriodo"
                    class="w-full border-gray-300 rounded mt-2">
                    <option value="">Seleccione un periodo</option>
                    @foreach ($periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('periodoSeleccionado')" class="mt-2" />
            </div>

            <!-- Grupos Asignados -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">
                    Grupos Asignados ({{ count($gruposAsignados) }})
                </label>

                <div class="overflow-y-auto max-h-60 border p-3 rounded">
                    @forelse ($gruposAsignados as $grupo)
                    <div class="flex items-center justify-between py-1">
                        <label class="text-gray-700">
                            <input type="checkbox" value="{{ $grupo['id'] }}" wire:model="gruposUsuario"
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            {{ $grupo['clave'] }} - {{ $grupo->materia->nombre ?? 'Sin materia' }}
                        </label>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm">No hay grupos asignados.</p>
                    @endforelse
                </div>
            </div>

            <!-- Buscador -->
            <div class="mb-4">
                <input type="text" wire:model="busqueda" wire:input="actualizarListas" placeholder="Buscar grupo..."
                    class="w-full border-gray-300 rounded px-3 py-2">
            </div>


            <!-- Grupos Disponibles -->
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700">
                    Grupos Disponibles ({{ count($gruposDisponibles) }})
                </label>

                <div class="overflow-y-auto max-h-60 border p-3 rounded">
                    @forelse ($gruposDisponibles as $grupo)
                    <div class="flex items-center justify-between py-1">
                        <label class="text-gray-700">
                            <input type="checkbox" value="{{ $grupo['id'] }}" wire:model="gruposUsuario"
                                class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            {{ $grupo['clave'] }} - {{ $grupo->materia['nombre'] ?? 'Sin materia' }}
                        </label>
                    </div>
                    @empty
                    <p class="text-gray-500 text-sm">No hay grupos disponibles.</p>
                    @endforelse
                </div>
            </div>

            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>

                <x-button type="submit" class="w-full md:w-auto">
                    Asignar Grupos
                </x-button>
            </div>
        </form>
    </div>
</div>