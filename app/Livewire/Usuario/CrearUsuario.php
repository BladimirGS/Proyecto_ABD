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
    public $contratosUsuario = [];
    public $email;
    public $password;

    // Reglas de validación
    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'rfc' => 'required',
        'contratosUsuario' => 'required|array',
        'contratosUsuario.*' => 'exists:contratos,id',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
    ];

    public function CrearUsuario()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        $user = User::create([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'rfc' => $datos['rfc'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password']),
        ]);
        
        // tabla intermedia
        $user->contratos()->attach($datos['contratosUsuario']);

        // se dispara un evento
        $this->dispatch('refreshDatatable');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.crear-usuario', [
            'contratos' => Contrato::all()
        ]);
    }
}
