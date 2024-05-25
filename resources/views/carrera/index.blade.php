<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Carreras</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white mx-auto px-4 lg:px-8 py-10">
            <div class="mb-4 flex justify-center md:justify-start">
                <x-link href="{{ route('carreras.create') }}">Registrar Grupo</x-link>
            </div>

                <table class="min-w-full divide-y divide-gray-200 table-bordered compact" id="myTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="Nombre" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($carreras as $carrera)
                        <tr>
                            <x-table-cell value="{{ $carrera->nombre }}" />
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-link color="blue" href="{{ route('carreras.edit', $carrera) }}">Editar</x-link>

                                    <form id="eliminarForm{{ $carrera->id }}" action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="mostrarAlerta({{ $carrera->id }})" class="btn btn-danger">Eliminar Carrera</button>
                                    </form>

                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay carreras</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css" />
    @endpush
    
    @push('scripts')
        
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                },
                stateSave: true,
                pagingType: 'simple_numbers',
                scrollX: true
            });
        });
    </script>

<script>
    function mostrarAlerta(carreraId) {
        Swal.fire({
            title: 'Eliminar Carrera?',
            text: "Una carrera eliminada no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Hacer la solicitud DELETE
                eliminarCarrera(carreraId);
            }
        });
    }

    function eliminarCarrera(carreraId) {
    // Obtener el formulario correspondiente al ID de la carrera
    var form = document.getElementById('eliminarForm' + carreraId);
    
    // Enviar el formulario
    form.submit();
}




</script>

    @endpush
</x-app-layout>