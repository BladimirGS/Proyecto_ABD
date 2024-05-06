<?php

namespace App\Livewire\Carrera;

use App\Models\Carrera;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarCarrera extends ModalComponent
{
    public Carrera $carrera;

    public $nombre;

    public function mount()
    {
        // rellena los nuevos valores
        $this->nombre = $this->carrera->nombre;
    }

    protected $rules = [
        'nombre' => 'required',
    ];

    public function EditarCarrera()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->carrera->update($datos);

        // se dispara un evento
        $this->dispatch('actualizar-carrera');

        // Se cierra el modal
        $this->closeModal();
    }
}
