<?php

namespace App\Livewire\Actividad;

use App\Models\Grupo;
use App\Models\Periodo;
use Livewire\Component;
use App\Models\Actividad;
use LivewireUI\Modal\ModalComponent;

class EditarActividad extends ModalComponent
{

    public Actividad $actividad;

    public $nombre;
    public $descripcion;
    public $fecha;
    public $firma;
    public $periodo_id;

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'fecha' => 'required',
        'firma' => 'required|boolean', 
        'periodo_id' => 'required',
    ];

    public function mount()
    {
        $this->nombre = $this->actividad->nombre;
        $this->descripcion = $this->actividad->descripcion;
        $this->fecha = $this->actividad->fecha;
        $this->firma = $this->actividad->firma;
        $this->periodo_id = $this->actividad->periodo_id;
    }

    public function EditarActividad()
    {
        $datos = $this->validate();
    
        if ($this->actividad->periodo_id != $datos['periodo_id']) {
            $this->actividad->grupos()->where('periodo_id', '!=', $datos['periodo_id'])->detach();
    
            $nuevosGrupos = Grupo::where('periodo_id', $datos['periodo_id'])->get();
            $this->actividad->grupos()->syncWithoutDetaching($nuevosGrupos->pluck('id'));
        }
    
        $this->actividad->update($datos);
    
        $this->dispatch('refreshDatatable');

        $this->dispatch('exito'); 
    
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
