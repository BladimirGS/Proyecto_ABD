<?php

namespace App\Livewire\Usuario;

use App\Models\Contrato;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class EditarUsuario extends ModalComponent
{
    public User $usuario;

    public $nombre;
    public $apellido;
    public $rfc;
    public $contratosUsuario;
    public $email;
    public $password;

    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'rfc' => 'required',
        'contratosUsuario' => 'required|array',
        'contratosUsuario.*' => 'exists:contratos,id',
        'email' => 'required',
        'password' => ['nullable', 'min:8']
    ];

    public function mount()
    {
        $this->nombre = $this->usuario->nombre;
        $this->apellido = $this->usuario->apellido;
        $this->rfc = $this->usuario->rfc;
        $this->contratosUsuario = $this->usuario->contratos()->pluck('contratos.id')->toArray();
        $this->email = $this->usuario->email;
    }

    public function EditarUsuario()
    {   
        // Validar los datos
        $datos = $this->validate();

        // Preparar los datos para actualizar
        $datosActualizar = [
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'rfc' => $datos['rfc'],
            'email' => $datos['email'],
        ];

        // Si se proporciona una nueva contraseña, se encripta y se incluye
        if (!empty($datos['password'])) {
            $datosActualizar['password'] = bcrypt($datos['password']);
        }

        // Se actualiza el usuario
        $this->usuario->update($datosActualizar);

        // Actualizar tabla intermedia
        $this->usuario->contratos()->sync($datos['contratosUsuario']);

        // Disparar eventos
        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');  
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.editar-usuario', [
            'contratos' => Contrato::all()
        ]);
    }
}
