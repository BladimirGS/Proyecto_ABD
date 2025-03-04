<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarActividad">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Editar Actividad</legend>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="$actividad->nombre"
                    placeholder="Nombre de la actividad"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="descripcion" value="Descripción" />

                <x-text-area 
                    id="descripcion"
                    wire:model="descripcion"
                    placeholder="Descripcion del role"
                    rows="4" 
                >{{ $actividad->descripcion }}</x-text-area> 
            
                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="firma" value="¿Requiere firma del jefe?" />
            
                <div class="flex items-center space-x-4 mt-2">
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            id="firma-si"
                            value="1"
                            wire:model="firma"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <span class="text-gray-700">Sí</span>
                    </label>
            
                    <label class="flex items-center space-x-2">
                        <input
                            type="radio"
                            id="firma-no"
                            value="0"
                            wire:model="firma"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <span class="text-gray-700">No</span>
                    </label>
                </div>
            
                <x-input-error :messages="$errors->get('firma')" class="mt-2" />
            </div>            

            <div class="mt-5">
                <x-input-label for="fecha" value="Fecha programada" />
    
                <x-text-input
                    id="fecha"
                    type="date"
                    wire:model="fecha"
                    :value="$actividad->fecha"
                    placeholder="Fecha de la actividad"
                />
                <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="periodo_id" value="Periodo" />
        
                <select 
                    id="periodo_id" 
                    wire:model="periodo_id" 
                    class="block w-full h-10 mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                >
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}"  {{ $periodo_id == $periodo->id ? 'selected' : '' }}>{{ $periodo->nombre }}</option>
                    @endforeach
                </select>
            
                <x-input-error :messages="$errors->get('periodo_id')" class="mt-2" />
            </div>

            <div class="mt-5 text-center space-x-4">
                <x-button wire:click="$dispatch('closeModal')" color="red">
                    Cancelar
                </x-button>
                
                <x-button type="submit">
                    Guardar cambio
                </x-button>
            </div>
        </form>
    </div>
</div>