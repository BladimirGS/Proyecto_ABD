<?php

namespace App\Livewire\Usuario;

use App\Models\Contrato;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CrearUsuario extends ModalComponent
{
    // Valores de entrada
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
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
    ];

    public function CrearUsuario()
    {
        // Se validan con las reglas
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
        return redirect()->route('users');
    }

    public function render()
    {
        return view('livewire.usuario.crear-usuario', [
            'contratos' => Contrato::all()
        ]);
    }
}
