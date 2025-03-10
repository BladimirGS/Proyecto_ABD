<div>
    <div class="md:flex md:justify-center p-10">
        <button wire:click="$dispatch('closeModal')" type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
            ✖
        </button>
        
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="CrearCarrera">
            @csrf
    
            <h2 class="block font-bold text-lg text-gray-700 text-center">Registrar Carrera</h2>
    
            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="old('nombre')"
                    placeholder="Nombre de la carrera"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
    
            <div class="mt-5 flex flex-col md:flex-row gap-4 justify-center">
                <x-button wire:click="$dispatch('closeModal')" type="button" color="red" class="w-full md:w-auto">
                    Cancelar
                </x-button>
            
                <x-button type="submit" class="w-full md:w-auto">
                    Registrar carrera
                </x-button>
            </div>
        </form>
    </div>
</div>