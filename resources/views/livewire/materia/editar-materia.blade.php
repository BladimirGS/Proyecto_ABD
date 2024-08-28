<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarMateria">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Registrar materia</legend>
    
            <div class="mt-5">
                <x-input-label for="clave" value="clave" />
    
                <x-text-input
                    id="clave"
                    type="text"
                    wire:model="clave"
                    :value="$materia->clave"
                    placeholder="clave del materia"
                />
                <x-input-error :messages="$errors->get('clave')" class="mt-2" />
            </div>

            <div class="mt-5">
                <x-input-label for="nombre" value="Nombre" />
    
                <x-text-input
                    id="nombre"
                    type="text"
                    wire:model="nombre"
                    :value="$materia->nombre"
                    placeholder="Nombre del materia"
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