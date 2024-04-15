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

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalMaxWidth(): string
    {
        return '3xl';
    }

    public function mount()
    {
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
        Gate::authorize('update', auth()->user());

        // Se hace la validacion
        $datos = $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'rfc' => 'required',
            'tipo' => 'required',
            'email' => 'required',
        ]);

        $this->usuario->update($datos);

        $this->dispatch('actualizar-usuario');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.editar-usuario');
    }
}
