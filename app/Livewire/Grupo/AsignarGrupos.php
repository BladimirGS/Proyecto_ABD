<?php

namespace App\Livewire\Grupo;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Periodo;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;

class AsignarGrupos extends ModalComponent
{
    public User $usuario;
    public $gruposUsuario = [];
    public $gruposAsignados = [];
    public $gruposDisponibles = [];
    public $periodoSeleccionado;
    public $periodos;
    public $busqueda = '';

    protected $rules = [
        'gruposUsuario' => 'array',
        'gruposUsuario.*' => 'exists:grupos,id',
        'periodoSeleccionado' => 'required|exists:periodos,id',
    ];

    public function mount()
    {
        $this->periodos = Periodo::where('activo', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $this->periodoSeleccionado = optional($this->periodos->first())->id; // Selecciona el primer periodo por defecto
    
        $this->gruposAsignados(); // Cargar los asignados al usuario
        $this->actualizarListas(); // Cargar los disponibles
    }    

    public function gruposAsignados()
    {
        // Grupos ya asignados al usuario (se deben mostrar)
        $gruposAsignadosUsuario = $this->usuario->grupos()
        ->wherePivot('periodo_id', $this->periodoSeleccionado)
        ->get(['grupos.id', 'clave', 'semestre']);

        $this->gruposAsignados = $gruposAsignadosUsuario;
        $this->gruposUsuario = $gruposAsignadosUsuario->pluck('id')->toArray();
    }

    public function actualizarListas()
    {
        if (!$this->periodoSeleccionado) {
            $this->gruposDisponibles = [];
            return;
        }
    
        // Grupos ya ocupados por otros usuarios
        $gruposOcupados = DB::table('grupo_user_periodo')
            ->where('periodo_id', $this->periodoSeleccionado)
            ->where('user_id', '!=', $this->usuario->id)
            ->pluck('grupo_id')
            ->toArray();
    
        // Excluir ocupados y los ya asignados al usuario
        $idsExcluir = array_unique(array_merge($gruposOcupados, $this->gruposUsuario));
    
        $query = Grupo::whereNotIn('id', $idsExcluir);
    
        if (!empty($this->busqueda)) {
            $query->where(function ($q) {
                $q->where('clave', 'like', "%{$this->busqueda}%")
                  ->orWhere('semestre', 'like', "%{$this->busqueda}%");
            });
        }
    
        $this->gruposDisponibles = $query->get(['id', 'clave', 'semestre']);
    }

    public function actualizarGrupos()
    {
        $datos = $this->validate();

        $this->usuario->grupos()->wherePivot('periodo_id', $this->periodoSeleccionado)->detach();
        $this->usuario->grupos()->attach($datos['gruposUsuario'], ['periodo_id' => $this->periodoSeleccionado]);

        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');

        $this->closeModal();
    }

    public function desasignarGrupo($grupoId)
    {
        DB::table('grupo_user_periodo')
            ->where('user_id', $this->usuario->id)
            ->where('grupo_id', $grupoId)
            ->where('periodo_id', $this->periodoSeleccionado)
            ->delete();

        $this->actualizarListas();
    }

    public function actualizarPeriodo()
    {
        $this->gruposAsignados();
        $this->actualizarListas();
    }      

    public function render()
    {
        return view('livewire.grupo.asignar-grupos');
    }    
}
