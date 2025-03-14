<x-app-layout>
    @role('Docente')
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
    @endrole

    @hasanyrole('Super Usuario|Administración')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <a href="{{ route('usuarios.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
            <img src="{{ asset('svg/usuario.svg') }}" alt="Usuario" class="w-10 h-10 mb-2">
            <span class="text-sm font-semibold text-gray-800 text-center">Usuarios</span>
        </a>
    
        <a href="{{ route('actividades.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
            <img src="{{ asset('svg/actividad.svg') }}" alt="Actividad" class="w-10 h-10 mb-2">
            <span class="text-sm font-semibold text-gray-800 text-center">Actividades</span>
        </a>
    
        <a href="{{ route('grupos.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
            <img src="{{ asset('svg/grupo.svg') }}" alt="Grupo" class="w-10 h-10 mb-2">
            <span class="text-sm font-semibold text-gray-800 text-center">Grupos</span>
        </a>
    
        <a href="{{ route('archivos.index')}} " class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
            <img src="{{ asset('svg/archivo.svg') }}" alt="Archivo" class="w-10 h-10 mb-2">
            <span class="text-sm font-semibold text-gray-800 text-center">Archivos</span>
        </a>
    
        <a href="{{ route('reportes.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
            <img src="{{ asset('svg/reporte.svg') }}" alt="Reporte" class="w-10 h-10 mb-2">
            <span class="text-sm font-semibold text-gray-800 text-center">Reportes</span>
        </a>
    </div>
    
    @endrole
</x-app-layout>
