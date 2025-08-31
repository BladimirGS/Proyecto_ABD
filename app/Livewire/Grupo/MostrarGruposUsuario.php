<?php

namespace App\Livewire\Grupo;

use App\Models\User;
use App\Models\Periodo;
use LivewireUI\Modal\ModalComponent;

class MostrarGruposUsuario extends ModalComponent
{
    public User $usuario;
    public $periodos;
    public $periodoSeleccionado;
    public $gruposDelUsuario = [];

    public function mount(User $usuario)
    {
        $this->usuario = $usuario;
        $this->periodos = Periodo::where('activo', true)
            ->orderBy('created_at', 'desc')
            ->get();
        $this->periodoSeleccionado = optional($this->periodos->first())->id;
        $this->cargarGrupos();
    }

    public function actualizarPeriodo()
    {
        $this->cargarGrupos();
    }

    public function cargarGrupos()
    {
        if (!$this->periodoSeleccionado) {
            $this->gruposDelUsuario = [];
            return;
        }

        // Traer grupos asignados al usuario para este periodo
        $gruposAsignados = $this->usuario->gruposUser()
            ->where('periodo_id', $this->periodoSeleccionado)
            ->with('grupo.materia')
            ->get();

        $this->gruposDelUsuario = $gruposAsignados->pluck('grupo');
    }

    public function render()
    {
        return view('livewire.grupo.mostrar-grupos-usuario');
    }
}
