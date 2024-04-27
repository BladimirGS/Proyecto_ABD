<x-button 
   wire:click="$dispatch('mostrarAlerta')"
   color=violet
>
   evento
</x-button>



@push('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', (usuarioId) => {
            Swal.fire({
                title: 'Eliminar usuario?',
                text: "Una usuario eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'si, Eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Eliminar la usuario
                  //   Livewire.emit('eliminarusuario', usuarioId)

                    Swal.fire(
                        'Se elimino la usuario',
                        'Eliminado correctamente',
                        'success'
                    )
                }
            })
        })
    </script>

@endpush