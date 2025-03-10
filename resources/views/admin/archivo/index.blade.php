<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de archivos
    </h1>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.archivo-datatable />
        </div>
    </div>
</x-app-layout>