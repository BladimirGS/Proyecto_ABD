<?php

namespace App\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\Periodo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditarActividad extends ModalComponent
{

    public Actividad $actividad;

    public $nombre;
    public $descripcion;
    public $fecha;
    public $periodo_id;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',
        'periodo_id' => 'required',
    ];

    public function mount()
    {
        // rellena los nuevos valores
        $this->nombre = $this->actividad->nombre;
        $this->descripcion = $this->actividad->descripcion;
        $this->fecha = $this->actividad->fecha;
        $this->periodo_id = $this->actividad->periodo_id;
    }

    public function EditarActividad()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // Se actualiza el usuario
        $this->actividad->update($datos);

        // se dispara un evento
        $this->dispatch('refreshDatatable');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        $periodos = Periodo::where('activo', true)->get();

        return view('livewire.actividad.editar-actividad', [
            'periodos' => $periodos
        ]);
    }
}
