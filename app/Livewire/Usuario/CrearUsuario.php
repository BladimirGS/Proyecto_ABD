<?php

namespace App\Livewire\Usuario;

use App\Models\Contrato;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class CrearUsuario extends ModalComponent
{
    public $nombre;
    public $apellido;
    public $rfc;
    public $contratosUsuario = [];
    public $email;
    public $password;

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
        $datos = $this->validate();

        $user = User::create([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'rfc' => $datos['rfc'],
            'email' => $datos['email'],
            'password' => bcrypt($datos['password']),
        ]);
        
        $user->contratos()->attach($datos['contratosUsuario']);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');        

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.crear-usuario', [
            'contratos' => Contrato::all()
        ]);
    }
}
