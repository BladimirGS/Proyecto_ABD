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
    public $firma;
    public $periodo_id;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',
        'periodo_id' => 'required',
        'firma' => 'required|boolean',
    ];

    public function CrearActividad()
    {
        // Validar datos
        $datos = $this->validate();
    
        // Crear Actividad
        $actividad = Actividad::create($datos);
    
        // Asociar grupos al periodo
        $grupos = Grupo::where('periodo_id', $datos['periodo_id'])->get();
        $actividad->grupos()->attach($grupos->pluck('id'));
    
        // Refrescar datatable y cerrar modal
        $this->dispatch('refreshDatatable');
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
