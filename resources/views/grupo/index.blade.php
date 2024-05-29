<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">Grupos</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">

            <livewire:datatable.grupo-datatable />
                
        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function mostrarAlerta(id) {
            Swal.fire({
                title: 'Eliminar Grupo?',
                text: "Un grupo eliminado no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Obtener el formulario correspondiente al ID de la carrera
                    var form = document.getElementById('eliminarForm' + id);
                    
                    // Enviar el formulario
                    form.submit();
                }
            });
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