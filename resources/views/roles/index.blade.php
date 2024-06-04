<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Roles</h2>
    </x-slot>

    <div class="py-10 w-full 2xl:w-2/3 mx-auto">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white mx-auto px-4 lg:px-8 py-10">
            <div class="mb-4 flex justify-center md:justify-start">
                <x-link href="{{ route('roles.create') }}">Registrar Role</x-link>
            </div>

                <table class="min-w-full divide-y divide-gray-200 table-bordered compact" id="myTable">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-table-header value="ID" />
                            <x-table-header value="Role" />
                            <x-table-header scope="col" class="relative">
                                <span class="sr-only">Editar/Eliminar</span>
                            </x-table-header>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($roles as $role)
                        <tr>
                            <x-table-cell value="{{ $role->id }}" />
                            <x-table-cell value="{{ $role->name }}" />
                            <x-table-cell>
                                <div class="flex justify-around gap-4">
                                    <x-link color="blue" href="{{ route('roles.edit', $role) }}">Editar</x-link>

                                    <form id="eliminarForm{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-button type="button" onclick="mostrarAlerta({{ $role->id }})" color="red">Eliminar</x-button>
                                    </form>

                                </div>
                            </x-table-cell>
                        </tr>
                        @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-lg font-semibold" colspan="6">No hay roles</td>
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
    function mostrarAlerta(roleId) {
        Swal.fire({
            title: 'Eliminar role?',
            text: "Una role eliminada no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Hacer la solicitud DELETE
                eliminarrole(roleId);
            }
        });
    }

    function eliminarrole(roleId) {
    // Obtener el formulario correspondiente al ID de la role
    var form = document.getElementById('eliminarForm' + roleId);
    
    // Enviar el formulario
    form.submit();
}




</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Verificar si existe un elemento con el ID 'alert'
        var alertElement = document.getElementById('alert');
        
        // Si el elemento existe, esperar 5 segundos y luego eliminarlo
        if (alertElement) {
            setTimeout(function() {
                alertElement.remove();
            }, 5000); // 5000 milisegundos = 5 segundos
        }
    });
</script>

    @endpush
</x-app-layout>