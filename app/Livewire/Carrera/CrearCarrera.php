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
        $datos = $this->validate();

        Carrera::create([
            'nombre' => $datos['nombre'],
        ]);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');

        $this->closeModal();
    }
}
