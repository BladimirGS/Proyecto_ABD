<x-app-layout :breadcrumbs="$breadcrumbs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        @if($gruposUser->isEmpty())
        <!-- Estado vacío -->
        <div class="text-center py-12">
            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No hay grupos registrados</h3>
        </div>
        @else
        <!-- Grid de grupos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($gruposUser as $grupoUser)
            @php
            $datos = $progreso[$grupoUser->id] ?? ['total' => 0, 'completadas' => 0];
            $total = $datos['total'];
            $completadas = $datos['completadas'];
            $porcentaje = $total > 0 ? ($completadas / $total) * 100 : 0;
            @endphp

            <a href="{{ route('docente.grupo.actividades.index', $grupoUser->id) }}"
                class="group block transform transition-all duration-200 hover:scale-105 hover:shadow-xl">
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:border-gray-300">
                    <!-- Header -->
                    <div class="h-24 relative"
                        style="background: linear-gradient(135deg, {{ $grupoUser->grupo->color ?? 'hsl(240, 60%, 50%)' }}, {{ str_replace(')', ', 0.8)',$grupoUser->grupo->color) ?? 'hsl(240, 60%, 50%, 0.8)' }});">
                        <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                        <div class="absolute top-4 right-4">
                            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-2">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Contenido -->
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900">
                            {{ $grupoUser->grupo->clave }}
                        </h3>
                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                            {{ $grupoUser->grupo->materia->nombre ?? 'Materia no asignada' }}
                        </p>

                        <!-- Progreso -->
                        <div class="mt-4 space-y-2">
                            <div class="flex items-center justify-between text-sm text-gray-700">
                                <span>Entregadas</span>
                                <span>{{ $completadas }} de {{ $total }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-gray-700">
                                <span>Aprobadas</span>
                                <span>{{ $progreso[$grupoUser->id]['aprobadas'] }} de {{ $total }}</span>
                            </div>

                            <!-- Barra principal (entregadas) -->
                            <div class="w-full bg-gray-200 rounded-full h-3 relative">
                                <div class="h-3 rounded-full transition-all duration-300"
                                    style="width: {{ min(($completadas / max($total,1)) * 100,100) }}%; background-color: {{ $grupoUser->grupo->color ?? '#4F46E5' }};">
                                </div>

                                <!-- Barra secundaria (aprobadas) -->
                                <div class="h-3 rounded-full transition-all duration-300 absolute top-0 left-0"
                                    style="width: {{ min(($progreso[$grupoUser->id]['aprobadas'] / max($total,1)) * 100,100) }}%; background-color: #16a34a; opacity: 0.8;">
                                </div>
                            </div>

                            <p class="text-xs text-gray-500 mt-1">
                                <span class="inline-block w-3 h-3 mr-1 rounded"
                                    style="background-color: {{ $grupoUser->grupo->color ?? '#4F46E5' }}"></span>
                                Entregadas
                                <span class="inline-block w-3 h-3 ml-4 mr-1 rounded bg-green-600"></span>
                                Aprobadas
                            </p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @endif
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