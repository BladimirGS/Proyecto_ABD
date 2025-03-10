<?php

namespace App\Livewire\Usuario;

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
        // Rellena los nuevos valores
        $this->rolesUsuario = $this->usuario->roles->pluck('id')->toArray();
    }

    public function actualizarRoles()
    {
        $datos = $this->validate();

        // dd($datos['rolesUsuario']);

        $this->usuario->roles()->sync($datos['rolesUsuario']);

        // se dispara un evento
        $this->dispatch('refreshDatatable');

        // Se dispara un evento para notificar la acción exitosa
        $this->dispatch('exito');  

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.asignar-roles', [
            'roles' => Role::all()
        ]);
    }
}
