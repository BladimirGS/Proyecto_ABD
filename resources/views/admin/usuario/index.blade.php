<x-app-layout :breadcrumbs="$breadcrumbs">
    <h1 class="font-bold text-2xl text-center uppercase">
        Lista de usuarios
    </h1>

    <div class="py-10 ">
        <x-session-status :status="session('status')" />

        <div class="bg-white w-full mx-auto px-4 lg:px-8 py-10">
            <livewire:datatable.usuario-datatable />
        </div>
    </div>

    @push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('mostrarAlerta', (id) => {
                Swal.fire({
                    title: 'Eliminar usuario?',
                    text: "Un usuario eliminada no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'si, Eliminar!',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'btn-confirm',
                        cancelButton: 'btn-cancel'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-usuario', id);
                        
                        Livewire.dispatch('exito');
                    }
                })
            })
        })
    </script>
    @endpush
</x-app-layout>