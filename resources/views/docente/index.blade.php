<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Grupos</h2>
    </x-slot>
    
    <div class="py-8">
        <div class="flex justify-around md:justify-end mb-6">
            <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mr-2">
                Mis grupos
            </button>
            <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                Agregar grupo
            </button>
        </div>

        @forelse ($gruposPorCarrera as $carrera => $gruposCarrera)
        <div class="mb-6">
            <h2 class="text-2xl font-bold">Carrera de {{ $carrera }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($gruposCarrera as $grupo)
                    <a href="{{ route('docente.grupo.actividades.index', $grupo->id) }}">
                        <div class="rounded-lg p-6 shadow-md mb-4" style="background-color: {{ $grupo->color ?? '#000000' }}">
                            <h2 class="text-white text-xl font-bold">{{ $grupo->clave }} - {{ $grupo->materia->nombre ?? "Desconocido" }}</h2>
                            <h2 class="text-white text-xl font-bold">Actividades completadas: {{ $actividadesCompletadas[$grupo->id] ?? 0 }}</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        @empty
        <h2 class="text-2xl font-bold">No hay grupos registrados</h2>
        @endforelse
    </div>
    
</x-app-layout>
