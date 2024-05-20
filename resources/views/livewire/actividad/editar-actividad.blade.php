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

            <div class="mt-5 text-center">
                <x-button type="submit">
                    Editar Actividad
                </x-button>
            </div>
        </form>
    </div>
</div>