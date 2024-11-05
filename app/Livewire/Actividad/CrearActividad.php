<?php

namespace App\Livewire\Actividad;

use App\Models\Grupo;
use App\Models\Periodo;
use Livewire\Component;
use App\Models\Actividad;
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
        // Validar datos
        $datos = $this->validate();
    
        // Crear Actividad
        $actividad = Actividad::create([
            'nombre' => $datos['nombre'],
            'descripcion' => $datos['descripcion'],
            'fecha' => $datos['fecha'],
            'periodo_id' => $datos['periodo_id'],
        ]);
    
        // Buscar grupos que tengan el mismo periodo_id y asociarlos a la actividad
        $grupos = Grupo::where('periodo_id', $datos['periodo_id'])->get();
        $actividad->grupos()->attach($grupos->pluck('id'));
    
        // Actualizar el datatable
        $this->dispatch('refreshDatatable');
    
        // Cerrar el modal
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
