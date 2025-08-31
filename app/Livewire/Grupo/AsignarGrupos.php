<?php

namespace App\Livewire\Grupo;

use App\Models\User;
use App\Models\Grupo;
use App\Models\GrupoUser;
use App\Models\Periodo;
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

        $this->periodoSeleccionado = optional($this->periodos->first())->id;

        $this->gruposAsignados();
        $this->actualizarListas();
    }

    public function gruposAsignados()
    {
        $gruposAsignadosUsuario = $this->usuario->gruposUser()
            ->where('periodo_id', $this->periodoSeleccionado)
            ->with('grupo.materia')
            ->get();

        $this->gruposAsignados = $gruposAsignadosUsuario->pluck('grupo');
        $this->gruposUsuario   = $gruposAsignadosUsuario->pluck('grupo_id')->toArray();
    }

    public function actualizarListas()
    {
        if (!$this->periodoSeleccionado) {
            $this->gruposDisponibles = [];
            return;
        }

        // Grupos ya ocupados por otros usuarios
        $gruposOcupados = GrupoUser::where('periodo_id', $this->periodoSeleccionado)
            ->where('user_id', '!=', $this->usuario->id)
            ->pluck('grupo_id')
            ->toArray();

        // Excluir ocupados y los ya asignados al usuario
        $idsExcluir = array_unique(array_merge($gruposOcupados, $this->gruposUsuario));

        $query = Grupo::whereNotIn('id', $idsExcluir);

        if (!empty($this->busqueda)) {
            $query->where('clave', 'like', "%{$this->busqueda}%");
        }

        $this->gruposDisponibles = $query
            ->with('materia')
            ->get(['id', 'clave', 'materia_id']);
    }

    public function actualizarGrupos()
    {
        $datos = $this->validate();

        // 🔹 Grupos actuales del usuario en este periodo
        $gruposActuales = $this->usuario->gruposUser()
            ->where('periodo_id', $this->periodoSeleccionado)
            ->pluck('grupo_id')
            ->toArray();

        // 🔹 Grupos que se desmarcaron → eliminar
        $gruposAEliminar = array_diff($gruposActuales, $datos['gruposUsuario']);
        if (!empty($gruposAEliminar)) {
            $this->usuario->gruposUser()
                ->where('periodo_id', $this->periodoSeleccionado)
                ->whereIn('grupo_id', $gruposAEliminar)
                ->get()
                ->each->delete(); // 🔹 dispara deleting
        }

        // 🔹 Grupos nuevos a asignar → insertar
        $gruposANuevos = array_diff($datos['gruposUsuario'], $gruposActuales);
        foreach ($gruposANuevos as $grupoId) {
            GrupoUser::create([
                'user_id'    => $this->usuario->id,
                'grupo_id'   => $grupoId,
                'periodo_id' => $this->periodoSeleccionado,
            ]);
        }

        $this->dispatch('refreshDatatable');
        $this->dispatch('exito');

        $this->gruposAsignados(); // 🔹 actualizar listas internas
        $this->actualizarListas();

        $this->closeModal();
    }

    public function actualizarPeriodo()
    {
        $this->gruposUsuario = [];
        $this->gruposAsignados();
        $this->actualizarListas();
    }

    public function render()
    {
        return view('livewire.grupo.asignar-grupos');
    }
}
