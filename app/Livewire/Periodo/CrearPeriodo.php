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
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        Periodo::create([
            'nombre' => $datos['nombre'],
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_fin' => $datos['fecha_fin'],
        ]);

        $this->dispatch('actualizar-periodo');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.periodo.crear-periodo');
    }
}
