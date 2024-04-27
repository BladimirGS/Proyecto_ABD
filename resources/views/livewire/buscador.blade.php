<div>
    <div class="my-5 w-4/5 md:w-2/3 mx-auto">
        <x-text-input
            id="termino"
            type="text"
            placeholder="Buscar por Término"
            wire:model="termino"
            x-on:input="$wire.enviarTerminoBusqueda()"
            />
    </div>
</div>