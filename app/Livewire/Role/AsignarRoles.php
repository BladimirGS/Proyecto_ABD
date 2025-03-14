<?php

namespace App\Livewire\Role;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class AsignarRoles extends ModalComponent
{
    public User $usuario;
    public $rolesUsuario = [];

    protected $rules = [
        'rolesUsuario' => 'array',
        'rolesUsuario.*' => 'exists:roles,id',
    ];

    public function mount()
    {
        $this->rolesUsuario = $this->usuario->roles->pluck('id')->toArray();
    }

    public function actualizarRoles()
    {
        $datos = $this->validate();

        $this->usuario->roles()->sync($datos['rolesUsuario']);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');  

        $this->closeModal();
    }
    
    public function render()
    {
        return view('livewire.role.asignar-roles', [
            'roles' => Role::all()
        ]);
    }
}
