<x-app-layout :breadcrumbs="$breadcrumbs">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @can('usuarios.index')
            <a href="{{ route('usuarios.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/usuario.svg') }}" alt="Usuario" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Usuarios</span>
            </a>
        @endcan

        @can('actividades.index')
            <a href="{{ route('actividades.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/actividad.svg') }}" alt="Actividad" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Actividades</span>
            </a>
        @endcan
    
        @can('grupos.index')
            <a href="{{ route('grupos.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/grupo.svg') }}" alt="Grupo" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Grupos</span>
            </a>
        @endcan
    
        @can('archivos.index')
            <a href="{{ route('archivos.index')}} " class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/archivo.svg') }}" alt="Archivo" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Archivos</span>
            </a>
        @endcan

        @can('reportes.index')
            <a href="{{ route('reportes.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/reporte.svg') }}" alt="Reporte" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Reportes</span>
            </a>
        @endcan

        @can('docentes.index')
            <a href="{{ route('docentes.index') }}" class="flex flex-col items-center justify-center p-4 h-32 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 hover:outline hover:outline-1 hover:outline-black">
                <img src="{{ asset('svg/tablero.svg') }}" alt="Reporte" class="w-10 h-10 mb-2">
                <span class="text-sm font-semibold text-gray-800 text-center">Tablero</span>
            </a>
        @endcan
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