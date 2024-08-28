<div>
    <div class="md:flex md:justify-center p-10">
        <form class="md:w-3/4 lg:w-2/3" wire:submit.prevent="EditarPeriodo">
            @csrf
    
            <legend class="block font-bold text-lg text-gray-700 text-center">Editar Periodo</legend>

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
    
            <div class="mt-5 text-center">
                <x-button type="submit">
                    Guardar cambio
                </x-button>
            </div>
        </form>
    </div>
</div>