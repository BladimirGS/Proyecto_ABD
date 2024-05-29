<?php

namespace App\Livewire\Rol;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Role;

class AsignarRol extends ModalComponent
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

        session()->flash('mensaje', 'Roles actualizados.');
        

        // Crear un mensaje
        session()->flash('mensaje', 'El Usuario se añadio correctamente');

        // Se cierra el modal
        $this->closeModal();
        
        $this->dispatch('actualizar-usuario');

    }

    public function render()
    {
        return view('livewire.rol.asignar-rol', [
            'roles' => Role::all()
        ]);
    }
}
