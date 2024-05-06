<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearCarrera extends ModalComponent
{
    public $nombre;

    protected $rules = [
        'nombre' => 'required',
    ];

    public function CrearCarrera()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        Carrera::create([
            'nombre' => $datos['nombre'],
        ]);

        $this->dispatch('actualizar-carrera');

        // Se cierra el modal
        $this->closeModal();
    }
}
