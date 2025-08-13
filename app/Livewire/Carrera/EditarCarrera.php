<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarCarrera extends ModalComponent
{
    public Carrera $carrera;

    public $clave;
    public $nombre;

    protected $rules = [
        'clave' => 'required',
        'nombre' => 'required',
    ];

    public function mount()
    {
        $this->clave = $this->carrera->clave;
        $this->nombre = $this->carrera->nombre;
    }

    public function EditarCarrera()
    {
        $datos = $this->validate();

        $datos['clave'] = mb_strtoupper($datos['clave'], 'UTF-8');
        $datos['nombre'] = mb_strtoupper($datos['nombre'], 'UTF-8');

        $this->carrera->update($datos);

        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');
        $this->closeModal();
    }
}
