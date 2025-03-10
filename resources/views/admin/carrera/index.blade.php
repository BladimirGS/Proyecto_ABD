<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de carreras
    </h1>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full xl:w-3/4 2xl:w-3/5 mx-auto px-4 lg:px-8 py-10">

            <livewire:Datatable.carrera-datatable>

        </div>
    </div>

    @push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar carrera?',
                    text: "Una carrera eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Eliminar!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eliminar la carrera
                        Livewire.dispatch('eliminar-carrera', id);
                        
                        Livewire.dispatch('exito');
                    }
                })
            })
        })
    </script>
    
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('exito', () => { 
                Swal.fire({
                    title: "Operación Exitosa",
                    icon: "success",
                    confirmButtonColor: '#7066e0',
                    confirmButtonText: 'Bien',
                });
            });
        });
    </script>
    @endpush
</x-app-layout>
