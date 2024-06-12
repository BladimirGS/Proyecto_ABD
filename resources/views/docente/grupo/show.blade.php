<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">
            {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? 'Nombre Desconocido') }}
        </h2>
    </x-slot>


</x-app-layout>