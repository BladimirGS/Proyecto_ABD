<div class="w-full flex items-center justify-center h-full">
    @isset($eventoCrear)
        <x-button class="w-full" wire:click="{{ $eventoCrear }}">Registrar</x-button>
    @endisset

    @isset($enlaceCrear)
        <x-link class="w-full" href="{{ $enlaceCrear }}">Registrar</x-link>
    @endisset
</div>
