<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">
            {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? 'Nombre Desconocido') }}
        </h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.docente-grupo-archivo-datatable :grupo="$grupo" />
        </div>
    </div>
</x-app-layout>