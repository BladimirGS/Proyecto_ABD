<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="CrearMateria">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Registrar Materia</legend>
    
            <div class="mt-5">
                <x-input-label for="clave" value="clave" />
    
                <x-text-input
                    id="clave"
                    type="text"
                    wire:model="clave"
                    :value="old('clave')"
                    placeholder="clave de la materia"
                />
                <x-input-error :messages="$errors->get('clave')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="old('nombre')"
                    placeholder="Nombre de la materia"
                />
                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            </div>
    
            <div class="mt-5 text-center space-x-4">
                <x-button wire:click="$dispatch('closeModal')" color="red">
                    Cancelar
                </x-button>
                
                <x-button type="submit">
                    Registrar materia
                </x-button>
            </div>
        </form>
    </div>
</div>