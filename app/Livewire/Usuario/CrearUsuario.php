<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearUsuario extends ModalComponent
{
    public $nombre;
    public $apellido;
    public $rfc;
    public $tipo;
    public $email;
    public $password;



    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'rfc' => 'required',
        'tipo' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
    ];

    public function CrearUsuario()
    {
        $datos = $this->validate();

        // crear usuario
        User::create([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'rfc' => $datos['rfc'],
            'tipo' => $datos['tipo'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password']),
        ]);

        // Crear un mensaje
        session()->flash('mensaje', 'El Usuario se añadio correctamente');

        // Redireccionar al usuario
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.usuario.crear-usuario');
    }


}
