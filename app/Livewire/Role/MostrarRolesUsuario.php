<?php

namespace App\Livewire\Role;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class MostrarRolesUsuario extends ModalComponent
{
    public User $usuario;

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
    }
    
    public function render()
    {
        return view('livewire.role.mostrar-roles-usuario');
    }
}
