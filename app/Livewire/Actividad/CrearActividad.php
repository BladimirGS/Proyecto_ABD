<?php

namespace App\Livewire\Actividad;

use App\Models\Actividad;
use App\Models\Periodo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CrearActividad extends ModalComponent
{
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

    public function CrearActividad()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear Actividad
        Actividad::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'fecha' => $datos['fecha'],
            'periodo_id' => $datos['periodo_id'],
        ]);
        
        // Actualizar el datatable
        $this->dispatch('refreshDatatable');

        // Se cierra el modal
        $this->closeModal();
    }

    public function render()
    {
        $periodos = Periodo::where('activo', true)->get();

        return view('livewire.actividad.crear-actividad', [
            'periodos' => $periodos
        ]);
    }
}
