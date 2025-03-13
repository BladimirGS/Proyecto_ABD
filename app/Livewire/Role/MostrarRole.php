<?php

namespace App\Livewire\Role;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class MostrarRole extends ModalComponent
{
    public Role $role;

    public function render()
    {
        return view('livewire.role.mostrar-role', [
            'role' => $this->role
        ]);
    }
}
