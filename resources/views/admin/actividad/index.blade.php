<x-app-layout>
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de actividades
    </h1>
    
    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">

            <livewire:Datatable.actividad-datatable>

        </div>
    </div>

@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar actividad?',
                    text: "Una actividad eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-actividad', id);
                        
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
