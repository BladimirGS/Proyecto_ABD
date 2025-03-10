<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        {{ $grupo->clave . " - " . ($grupo->materia->nombre ?? '') }}
    </h1>

    <div class="py-10 ">
        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.docente-grupo-archivo-datatable :grupo="$grupo" />
        </div>
    </div>
</x-app-layout>