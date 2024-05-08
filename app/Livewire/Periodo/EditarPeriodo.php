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
        // rellena los nuevos valores
        $this->nombre = $this->periodo->nombre;
        $this->fecha_inicio = $this->periodo->fecha_inicio;
        $this->fecha_fin = $this->periodo->fecha_fin;
    }

    public function EditarPeriodo()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->periodo->update($datos);

        // se dispara un evento
        $this->dispatch('actualizar-periodo');

        // Se cierra el modal
        $this->closeModal();
    }
}
