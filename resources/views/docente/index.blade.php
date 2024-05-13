<x-app-layout>
    <div class="flex flex-col">
        @foreach ($gruposPorCarrera as $carrera => $gruposCarrera)
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Carrera de {{ $carrera }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                @foreach ($gruposCarrera as $grupo)
                    <div class="rounded-lg p-6 shadow-md mb-4" style="background-color: {{ $grupo->color ?? '#000000' }}">
                        <h2 class="text-xl font-bold">{{ $grupo->clave }} - {{ $grupo->materia->nombre }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach    
    </div>
</x-app-layout>
