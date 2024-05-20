<?php

namespace App\Livewire\Actividad;

use App\Models\Activity;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearActividad extends ModalComponent
{
    public $nombre;
    public $fecha;

    protected $rules = [
        'nombre' => 'required',
        'fecha' => 'required',
    ];

    public function CrearActividad()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        Activity::create([
            'nombre' => $datos['nombre'],
            'fecha' => $datos['fecha'],
        ]);

        $this->dispatch('actualizar-actividad');

        // Se cierra el modal
        $this->closeModal();
    }
}
