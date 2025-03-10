<?php

namespace App\Livewire\Periodo;

use App\Models\Periodo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearPeriodo extends ModalComponent
{
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;

    protected $rules = [
        'nombre' => 'required',
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
    ];

    public function CrearPeriodo()
    {
        $datos = $this->validate();

        Periodo::create([
            'nombre' => $datos['nombre'],
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin' => $datos['fecha_fin'],
        ]);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');

        $this->closeModal();
    }
}
