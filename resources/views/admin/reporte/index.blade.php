<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Archivos</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full md:w-3/5 mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.reporte-datatable />
        </div>
    </div>
</x-app-layout>