<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarActividad">
            @csrf

            <h2 class="block font-bold text-lg text-gray-700 text-center">Editar Actividad</h2>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />

                <x-text-input id="nombre" type="text" wire:model="nombre" :value="$actividad->nombre"
                    placeholder="Nombre de la actividad" />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="descripcion" value="Descripción" />

                <x-text-area id="descripcion" wire:model="descripcion" placeholder="Descripcion del role" rows="4">{{
                    $actividad->descripcion }}</x-text-area>

                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="firma" value="¿Requiere firma del jefe?" />

                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" id="firma-si" value="1" wire:model="firma"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="text-gray-700">Sí</span>
                    </label>

                    <label class="flex items-center space-x-2">
                        <input type="radio" id="firma-no" value="0" wire:model="firma"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="text-gray-700">No</span>
                    </label>
                </div>

                <x-input-error :messages="$errors->get('firma')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="fecha" value="Fecha programada" />

                <x-text-input id="fecha" type="date" wire:model="fecha" :value="$actividad->fecha"
                    placeholder="Fecha de la actividad" />
                <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
            </div>

            <div class="mt-5">
                <span class="block font-medium text-sm text-gray-700 cursor-default">Periodo</span>

                <select id="periodo_id" wire:model="periodo_id"
                    class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="null" disabled {{ empty($periodo_id) ? 'selected' : '' }}>Selecciona un periodo
                    </option>

                    @foreach ($periodos as $periodo)
                    <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('periodo_id')" class="mt-2" />
            </div>

            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>

                <x-button type="submit" class="w-full md:w-auto">
                    Guardar cambio
                </x-button>
            </div>
        </form>
    </div>
</div>