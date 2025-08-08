<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupoUser->grupo->clave . " - " . ($grupoUser->grupo->materia->nombre ?? '') }}
    </h1>

    <div class="py-10 ">
        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.docente-grupo-archivo-datatable :grupoUser="$grupoUser" />
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('archivoDisponible', url => {
                window.open(url, '_blank');
            });
        });
    </script>
    @endpush
</x-app-layout>