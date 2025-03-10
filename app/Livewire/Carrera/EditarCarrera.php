<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarCarrera extends ModalComponent
{
    public Carrera $carrera;

    public $nombre;

    protected $rules = [
        'nombre' => 'required',
    ];

    public function mount()
    {
        $this->nombre = $this->carrera->nombre;
    }

    public function EditarCarrera()
    {
        $datos = $this->validate();

        $this->carrera->update($datos);

        $this->dispatch('refreshDatatable');

        $this->dispatch('exito');

        $this->closeModal();
    }
}
