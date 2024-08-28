<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarCarrera">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Editar Carrera</legend>
    
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
    
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Guardar cambio
                </x-button>
            </div>
        </form>
    </div>
</div>