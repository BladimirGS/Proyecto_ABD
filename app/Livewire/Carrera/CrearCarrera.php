<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearCarrera extends ModalComponent
{
    public $clave;
    public $nombre;

    protected $rules = [
        'clave' => 'required',
        'nombre' => 'required',
    ];

    public function CrearCarrera()
    {
        $datos = $this->validate();

        $datos['clave'] = mb_strtoupper($datos['clave'], 'UTF-8');
        $datos['nombre'] = mb_strtoupper($datos['nombre'], 'UTF-8');

        Carrera::create([
            'clave' => $datos['clave'],
            'nombre' => $datos['nombre'],
        ]);

        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');
        $this->closeModal();
    }
}
