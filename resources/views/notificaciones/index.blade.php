<x-app-layout :breadcrumbs="$breadcrumbs">
    <div class="py-12 sm:px-6 lg:px-8">
        <div class="w-full lg:w-2/3 xl:w-3/5 2xl:w-2/4 bg-white shadow-sm sm:rounded-lg mx-auto">
            <h1 class="text-2xl font-bold text-center my-8">🔔 Mis Notificaciones</h1>

            <div class="bg-white px-6 pb-10">

                @php
                // Límite inicial que se renderiza en el servidor
                $limit = 5;
                @endphp

                {{-- ================== NO LEÍDAS ================== --}}
                <h2 class="text-lg font-bold mb-2">No leídas</h2>
                <div id="no-leidas-container">
                    @forelse ($notificacionesNoLeidas as $notificacion)
                    @php
                    $data = $notificacion['data'];
                    $estado = $data['archivo']['estado'] ?? 'Aprobado';
                    $color = $estado === 'Aprobado'
                    ? 'text-green-600 bg-green-100'
                    : 'text-red-600 bg-red-100';
                    @endphp
                    <div
                        class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 py-4">
                        <div class="flex-1">
                            <p class="text-gray-700">
                                Grupo <span class="font-semibold">{{ $data['grupo']['clave'] }}</span> -
                                <span class="font-semibold">{{ $data['materia']['nombre'] }}</span>:
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $color }}">
                                    {{ $estado }}
                                </span>
                            </p>
                            <p class="text-sm text-gray-500">
                                Actividad: {{ $data['actividad']['nombre'] }} |
                                {{ $notificacion['created_at'] }}
                            </p>
                        </div>
                        <div class="mt-3 sm:mt-0">
                            <a href="{{ route('docente.grupo.actividades.show', [
                            'grupoUser' => $data['grupoUser']['id'],
                            'actividad' => $data['actividad']['id'],
                            'notification_id' => $notificacion['id']
                        ]) }}"
                                class="inline-block bg-indigo-500 hover:bg-indigo-600 px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500">No tienes notificaciones no leídas.</p>
                    @endforelse
                </div>

                {{-- Botón para cargar más --}}
                @if ($notificacionesNoLeidas->count() >= $limit)
                <div class="mt-4 text-center">
                    <button id="mostrar-mas-no-leidas" data-tipo="no-leidas"
                        data-offset="{{ $notificacionesNoLeidas->count() }}"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 text-xs rounded-lg">
                        Mostrar más
                    </button>
                </div>
                @endif

                {{-- ================== LEÍDAS ================== --}}
                <h2 class="text-lg font-bold mb-2 mt-6">Leídas</h2>
                <div id="leidas-container">
                    @forelse ($notificacionesLeidas as $notificacion)
                    @php
                    $data = $notificacion['data'];
                    $estado = $data['archivo']['estado'] ?? 'Aprobado';
                    $color = $estado === 'Aprobado'
                    ? 'text-green-600 bg-green-100'
                    : 'text-red-600 bg-red-100';
                    @endphp
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
                                Actividad: {{ $data['actividad']['nombre'] }} |
                                {{ $notificacion['created_at'] }}
                            </p>
                        </div>
                        <div class="mt-3 sm:mt-0">
                            <a href="{{ route('docente.grupo.actividades.show', [
                            'grupoUser' => $data['grupoUser']['id'],
                            'actividad' => $data['actividad']['id'],
                            'notification_id' => $notificacion['id']
                        ]) }}"
                                class="inline-block bg-gray-400 hover:bg-gray-500 px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                                Ver detalle
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500">No tienes notificaciones leídas.</p>
                    @endforelse
                </div>

                {{-- Botón para cargar más --}}
                @if ($notificacionesLeidas->count() >= $limit)
                <div class="mt-4 text-center">
                    <button id="mostrar-mas-leidas" data-tipo="leidas"
                        data-offset="{{ $notificacionesLeidas->count() }}"
                        class="bg-gray-200 hover:bg-gray-300 px-4 py-2 text-xs rounded-lg">
                        Mostrar más
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        async function cargarMas(button) {
        const tipo = button.dataset.tipo; // 'no-leidas' | 'leidas'
        let offset = parseInt(button.dataset.offset, 10) || 0;

        const url = "{{ route('notificaciones.cargar-mas') }}";
        const resp = await fetch(`${url}?tipo=${encodeURIComponent(tipo)}&offset=${offset}`);
        const notificaciones = await resp.json();

        if (!Array.isArray(notificaciones) || notificaciones.length === 0) {
            button.disabled = true;
            button.textContent = 'No hay más';
            return;
        }

        const container = tipo === 'leidas'
            ? document.getElementById('leidas-container')
            : document.getElementById('no-leidas-container');

        notificaciones.forEach(n => {
            const estado = n.data.archivo.estado;
            const color = (estado === 'Aprobado')
                ? 'text-green-600 bg-green-100'
                : 'text-red-600 bg-red-100';

            const fecha = n.created_at; 

            // 🚨 Aquí se añade ?notification_id=${n.id}
            const href = "{{ url('/docente/grupo') }}" +
                `/${n.data.grupoUser.id}/actividades/${n.data.actividad.id}?notification_id=${encodeURIComponent(n.id)}`;

            const html = `
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-200 py-4 ${tipo === 'leidas' ? 'opacity-70' : ''}">
                <div class="flex-1">
                    <p class="text-gray-700">
                        Grupo <span class="font-semibold">${n.data.grupo.clave}</span> -
                        <span class="font-semibold">${n.data.materia.nombre}</span>:
                        <span class="px-2 py-1 rounded-full text-xs font-bold ${color}">
                            ${estado}
                        </span>
                    </p>
                    <p class="text-sm text-gray-500">
                        Actividad: ${n.data.actividad.nombre} | ${fecha}
                    </p>
                </div>
                <div class="mt-3 sm:mt-0">
                    <a href="${href}"
                       class="inline-block ${tipo === 'leidas' ? 'bg-gray-400 hover:bg-gray-500' : 'bg-indigo-500 hover:bg-indigo-600'} px-4 py-2 text-xs font-semibold text-white rounded-lg transition">
                       Ver detalle
                    </a>
                </div>
            </div>`;
            container.insertAdjacentHTML('beforeend', html);
        });

        // Actualiza el offset del botón
        button.dataset.offset = offset + notificaciones.length;
    }

    document.getElementById('mostrar-mas-no-leidas')?.addEventListener('click', function () {
        cargarMas(this);
    });

    document.getElementById('mostrar-mas-leidas')?.addEventListener('click', function () {
        cargarMas(this);
    });
    </script>
</x-app-layout>