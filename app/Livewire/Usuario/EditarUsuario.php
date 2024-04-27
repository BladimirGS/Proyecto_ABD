<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class EditarUsuario extends ModalComponent
{
    // Usuario antes de actualizar
    public User $usuario;

    // Nuevos valores
    public $nombre;
    public $apellido;
    public $rfc;
    public $tipo;
    public $email;
    public $password;

    // Reglas de validación
    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'rfc' => 'required',
        'tipo' => 'required|in:Planta,Honorario,Interino,Administrador',
        'email' => 'required',
    ];

    public function mount()
    {
        // verificar que el usuario tenga permisos
        Gate::authorize('update', auth()->user());

        // rellena los nuevos valores
        $this->nombre = $this->usuario->nombre;
        $this->apellido = $this->usuario->apellido;
        $this->rfc = $this->usuario->rfc;
        $this->tipo = $this->usuario->tipo;
        $this->email = $this->usuario->email;
    }

    public function EditarUsuario()
    {
        // verificar que el usuario tenga permisos
        Gate::authorize('update', auth()->user());

        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->usuario->update($datos);

        // se dispara un evento
        $this->dispatch('actualizar-usuario');

        // Se cierra el modal
        $this->closeModal();
    }
}
