<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>

        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="CrearPeriodo">
            @csrf
    
            <h2 class="block font-bold text-lg text-gray-700 text-center uppercase">Registrar Periodo</h2>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" class="uppercase" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="old('nombre')"
                    placeholder="Nombre del periodo"
                    class="uppercase"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="fecha_inicio" value="fecha inicio" class="uppercase" />
    
                <x-text-input
                    id="fecha_inicio"
                    type="date"
                    wire:model="fecha_inicio"
                    :value="old('fecha_inicio')"
                />
                <x-input-error :messages="$errors->get('fecha_inicio')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="fecha_fin" value="fecha fin" class="uppercase" />
    
                <x-text-input
                    id="fecha_fin"
                    type="date"
                    wire:model="fecha_fin"
                    :value="old('fecha_fin')"
                />
                <x-input-error :messages="$errors->get('fecha_fin')" class="mt-2" />
            </div>
    
            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>
            
                <x-button type="submit" class="w-full md:w-auto">
                    Registrar Periodo
                </x-button>
            </div>
        </form>
    </div>
</div>