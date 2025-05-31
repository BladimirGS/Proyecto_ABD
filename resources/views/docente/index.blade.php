<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Tablero
    </h1>
    
    <div class="py-8">
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

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('status'))
            Livewire.dispatch('exito');
            @endif
        });
    </script>
@endpush
</x-app-layout>
