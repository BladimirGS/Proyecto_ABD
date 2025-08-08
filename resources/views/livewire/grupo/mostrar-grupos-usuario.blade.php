<div>
    <div class="bg-white mx-auto max-w-2xl p-8 rounded-lg shadow-lg relative">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <h2 class="block font-bold text-lg text-gray-700 text-center">Grupos del Usuario</h2>

        <div class="mt-5">
            <x-input-label value="Nombre del Usuario" />
            <p class="text-gray-800 border border-gray-300 rounded-md p-2">{{ $usuario->nombre . ' ' . $usuario->apellido }}</p>
        </div>

        <!-- Selector de Periodo -->
        <div class="mt-5">
            <x-input-label value="Periodo" />
            <select wire:model="periodoSeleccionado" wire:change="actualizarPeriodo" class="w-full border-gray-300 rounded mt-2">
                @foreach ($periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Lista de Grupos -->
        <div class="mt-5">
            <h2 class="block font-medium text-sm text-gray-700">Grupos Asignados en el Periodo</h2>

            @if (empty($gruposDelUsuario) || count($gruposDelUsuario) === 0)
                <p class="text-gray-500 mt-2">Este usuario no tiene grupos asignados en este periodo.</p>
            @else
                <ul class="mt-2 border border-gray-300 rounded-md p-2">
                    @foreach ($gruposDelUsuario as $grupo)
                        <li class="text-gray-800">• {{ $grupo->clave }} - {{ $grupo->semestre }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-5 flex justify-center">
            <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                Cerrar
            </x-button>
        </div>
    </div>
</div>
