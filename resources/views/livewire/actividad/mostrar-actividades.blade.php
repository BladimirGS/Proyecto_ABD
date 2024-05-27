<div>
    <x-slot name="header">
        <h2 class="font-bold text-xl md:text-2xl leading-tight">actividades</h2>
    </x-slot>

    <div class="py-10 ">
        <!-- Mensaje de estado -->
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full 2xl:w-3/4 mx-auto px-4 lg:px-8 py-10">

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
                    // Eliminar la actividad
                    Livewire.dispatch('eliminar-actividad', id)

                    Swal.fire(
                        'Se elimino la actividad',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })
        })
    })
    </script>

@endpush
</div>
