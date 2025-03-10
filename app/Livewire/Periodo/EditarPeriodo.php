<?php

namespace App\Livewire\Periodo;

use App\Models\Periodo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarPeriodo extends ModalComponent
{
    public Periodo $periodo;

    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;

    protected $rules = [
        'nombre' => 'required',
        'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
    ];

    public function mount()
    {
        $this->nombre = $this->periodo->nombre;
        $this->fecha_inicio = $this->periodo->fecha_inicio;
        $this->fecha_fin = $this->periodo->fecha_fin;
    }

    public function EditarPeriodo()
    {
        $datos = $this->validate();

        $this->periodo->update($datos);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');     

        $this->closeModal();
    }
}
