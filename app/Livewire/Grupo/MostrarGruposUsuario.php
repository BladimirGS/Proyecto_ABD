<?php

namespace App\Livewire\Grupo;

use App\Models\User;
use App\Models\Periodo;
use Livewire\Component;
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
        $this->periodos = Periodo::orderBy('created_at', 'desc')->get();
        $this->periodoSeleccionado = optional($this->periodos->first())->id;
        $this->cargarGrupos();
    }

    public function actualizarPeriodo()
    {
        $this->cargarGrupos();
    }

    public function cargarGrupos()
    {
        $this->gruposDelUsuario = $this->usuario->grupos()
            ->wherePivot('periodo_id', $this->periodoSeleccionado)
            ->with('materia')
            ->get(['clave', 'semestre']);
    }

    public function render()
    {
        return view('livewire.grupo.mostrar-grupos-usuario');
    }
}
