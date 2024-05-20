<?php

namespace App\Livewire\Actividad;

use App\Models\Activity;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarActividad extends ModalComponent
{

    public Activity $actividad;

    public $nombre;
    public $fecha;

    protected $rules = [
        'nombre' => 'required',
        'fecha' => 'required',
    ];

    public function mount()
    {
        // rellena los nuevos valores
        $this->nombre = $this->actividad->nombre;
        $this->fecha = $this->actividad->fecha;
    }

    public function EditarActividad()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->actividad->update($datos);

        // se dispara un evento
        $this->dispatch('actualizar-actividad');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.actividad.editar-actividad');
    }
}
