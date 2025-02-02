<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class MostrarUsuario extends ModalComponent
{
    public User $usuario;
    
    public function render()
    {
        return view('livewire.usuario.mostrar-usuario', [
            'usuario' => $this->usuario
        ]);
    }
}
