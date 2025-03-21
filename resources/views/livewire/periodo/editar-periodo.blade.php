<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarPeriodo">
            @csrf
    
            <h2 class="block font-bold text-lg text-gray-700 text-center">Editar Periodo</h2>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="$periodo->nombre"
                    placeholder="Nombre de la periodo"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="fecha_inicio" value="fecha_inicio" />
    
                <x-text-input
                    id="fecha_inicio"
                    type="date"
                    wire:model="fecha_inicio"
                    :value="$periodo->fecha_inicio"
                    placeholder="fecha de inicio del periodo"
                />
                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="fecha_fin" value="fecha_fin" />
    
                <x-text-input
                    id="fecha_fin"
                    type="date"
                    wire:model="fecha_fin"
                    :value="$periodo->fecha_fin"
                    placeholder="fecha final del periodo"
                />
                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
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