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
        // dd($this->contratosUsuario);
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->usuario->update([
            'nombre' => $datos['nombre'],
            'apellido' => $datos['apellido'],
            'rfc' => $datos['rfc'],
            'email' => $datos['email'],
        ]);

        // Actualizar tabla intermedia
        $this->usuario->contratos()->sync($datos['contratosUsuario']);

        // se dispara un evento
        $this->dispatch('refreshDatatable');

        // Se dispara un evento para notificar la acción exitosa
        $this->dispatch('exito');  

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.usuario.editar-usuario', [
            'contratos' => Contrato::all()
        ]);
    }
}
