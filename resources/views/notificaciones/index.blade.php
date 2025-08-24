<x-app-layout :breadcrumbs="$breadcrumbs">
    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 bg-white shadow-sm sm:rounded-lg mx-auto">
            <h1 class="text-2xl font-bold text-center my-8">🔔 Mis Notificaciones</h1>

            <div class="bg-white px-6 pb-10">
                @php
                // límite inicial de notificaciones a mostrar
                $limit = 5;
                @endphp

                {{-- ================== NO LEÍDAS ================== --}}
                <h2 class="text-lg font-bold mb-4">No leídas</h2>
                <div id="no-leidas-container">
                    @forelse ($notificacionesNoLeidas as $notificacion)
                    {{-- Notificación individual aquí --}}
                    @empty
                    <p class="text-gray-500">No tienes notificaciones no leídas.</p>
                    @endforelse
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 py-4">
                    <div class="flex-1">
                        <p class="text-gray-700">
                            Grupo <span class="font-semibold">{{ $data['grupo']['clave'] }}</span> -
                            <span class="font-semibold">{{ $data['materia']['nombre'] }}</span>:
                            <span class="px-2 py-1 rounded-full text-xs font-bold {{ $color }}">
                                {{ $estado }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-500">
                            Actividad: {{ $data['actividad']['nombre'] }} | {{
                            $notificacion->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <a href="{{ route('docente.grupo.actividades.show', [
                                'grupoUser' => $data['grupoUser']['id'],
                                'actividad' => $data['actividad']['id']
                            ]) }}"
                            class="inline-block bg-indigo-500 hover:bg-indigo-600 px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                            Ver detalle
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">No tienes notificaciones no leídas.</p>
                @endforelse

                @if($notificacionesNoLeidas->count() > $limit)
                <div class="text-center mt-4">
                    <button id="mostrar-mas-no-leidas" data-tipo="no-leidas" data-offset="{{ $limit }}"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-sm font-semibold">
                        Mostrar más
                    </button>
                </div>
                @endif

                {{-- ================== LEÍDAS ================== --}}
                <h2 class="text-lg font-bold mt-10 mb-4">Leídas</h2>
                <div id="leidas-container">
                    @forelse ($notificacionesLeidas as $notificacion)
                    {{-- Notificación individual aquí --}}
                    @empty
                    <p class="text-gray-500">No tienes notificaciones leídas.</p>
                    @endforelse
                </div>

                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 py-4 opacity-70">
                    <div class="flex-1">
                        <p class="text-gray-700">
                            Grupo <span class="font-semibold">{{ $data['grupo']['clave'] }}</span> -
                            <span class="font-semibold">{{ $data['materia']['nombre'] }}</span>:
                            <span class="px-2 py-1 rounded-full text-xs font-bold {{ $color }}">
                                {{ $estado }}
                            </span>
                        </p>
                        <p class="text-sm text-gray-500">
                            Actividad: {{ $data['actividad']['nombre'] }} | {{
                            $notificacion->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <a href="{{ route('docente.grupo.actividades.show', [
                                'grupoUser' => $data['grupoUser']['id'],
                                'actividad' => $data['actividad']['id']
                            ]) }}"
                            class="inline-block bg-gray-400 hover:bg-gray-500 px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                            Ver detalle
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">No tienes notificaciones leídas.</p>
                @endforelse

                @if($notificacionesLeidas->count() > $limit)
                <div class="text-center mt-4">
                    <button id="mostrar-mas-leidas" data-tipo="leidas" data-offset="{{ $limit }}"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-sm font-semibold">
                        Mostrar más
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        async function cargarMas(button) {
            const tipo = button.dataset.tipo;
            let offset = parseInt(button.dataset.offset);

            const response = await fetch("{{ route('notificaciones.cargar-mas') }}?tipo=" + tipo + "&offset=" + offset);
            const notificaciones = await response.json();

            if(notificaciones.length === 0){
                button.disabled = true;
                button.textContent = "No hay más";
                return;
            }

            const container = tipo === 'leidas' 
                ? document.querySelector('#leidas-container') 
                : document.querySelector('#no-leidas-container');

            notificaciones.forEach(n => {
                const estado = n.data.archivo.estado;
                const color = estado === 'Aprobado' ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100';
                const html = `
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 py-4">
                    <div class="flex-1">
                        <p class="text-gray-700">
                            Grupo <span class="font-semibold">${n.data.grupo.clave}</span> - 
                            <span class="font-semibold">${n.data.materia.nombre}</span>:
                            <span class="px-2 py-1 rounded-full text-xs font-bold ${color}">
                                ${estado}
                            </span>
                        </p>
                        <p class="text-sm text-gray-500">
                            Actividad: ${n.data.actividad.nombre} | ${new Date(n.created_at).toLocaleString()}
                        </p>
                    </div>
                    <div class="mt-3 sm:mt-0">
                        <a href="/docente/grupo/${n.data.grupoUser.id}/actividad/${n.data.actividad.id}"
                        class="inline-block bg-indigo-500 hover:bg-indigo-600 px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                        Ver detalle
                        </a>
                    </div>
                </div>`;
                container.insertAdjacentHTML('beforeend', html);
            });

            // actualizar offset
            button.dataset.offset = offset + notificaciones.length;
        }

    document.getElementById('mostrar-mas-no-leidas')?.addEventListener('click', function() {
        cargarMas(this);
    });

    document.getElementById('mostrar-mas-leidas')?.addEventListener('click', function() {
        cargarMas(this);
    });
    </script>
    @endpush
</x-app-layout>