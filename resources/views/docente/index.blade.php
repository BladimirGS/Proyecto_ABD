<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-lg md:text-xl truncate sm:whitespace-normal">Grupos</h2>
    </x-slot>
    
    <div class="py-8">
        <div class="flex flex-col items-center md:flex-row md:justify-between mb-6">
            <div class="mb-4 md:mb-0 md:mr-auto">
                <x-link href="{{ route('reportes.index') }}">Reportes</x-link>
            </div>
        
            <div class="flex justify-around w-full md:w-auto md:gap-8">
                <x-link color="violet" href="{{ route('docente.grupos.index') }}">Mis Grupos</x-link>
                {{-- <x-link color="green" href="{{ route('docente.grupos.create') }}">Nuevo Grupo</x-link> --}}
            </div>
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
