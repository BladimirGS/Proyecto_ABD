<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;

class MostrarUsuarios extends Component
{
    use WithPagination;

    public $termino;

    #[On('eliminar-usuario')]
    public function EliminarUsuario(User $id) 
    {
        // verificar que el usuario tenga permisos
        Gate::authorize('delete', auth()->user());
        $id->delete();
    }

    #[On('buscar-usuario')]
    public function buscar($termino)
    {
        $this->termino = $termino;
        $this->resetPage();
    }
    
    #[On('actualizar-usuario')]
    public function render()
    {
        $usuarios = User::when($this->termino, function($query) {
                $query->where('nombre', 'LIKE', "%" . $this->termino . "%")
                      ->orWhere('apellido', 'LIKE', "%" . $this->termino . "%")
                      ->orWhere('rfc', $this->termino)
                      ->orWhere('tipo', $this->termino)
                      ->orWhere('email', $this->termino);
            })
            ->paginate(5);
    
        return view('livewire.usuario.mostrar-usuarios', [
            'usuarios' => $usuarios
        ]);
    }
}
