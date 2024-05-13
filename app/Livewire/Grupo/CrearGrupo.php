<?php

namespace App\Livewire\Grupo;

use App\Models\Carrera;
use App\Models\Grupo;
use Livewire\Component;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\User;

class CrearGrupo extends Component
{
    public $clave;
    public $semestre;
    public $user_id;
    public $carrera_id;
    public $materia_id;
    public $periodo_id;

    protected $rules = [
        'clave' => 'required',
        'semestre' => 'required',
        'user_id' => 'required',
        'carrera_id' => 'required',
        'materia_id' => 'required',
        'periodo_id' => 'required',
    ];

    public function CrearGrupo()
    {
        // Se validan con las reglas
        $datos = $this->validate();

        // crear usuario
        Grupo::create([
            'clave' => $datos['clave'],
            'semestre' => $datos['semestre'],
            'user_id' => $datos['user_id'],
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
            'periodo_id' => $datos['periodo_id'],
        ]);

        session()->flash('status', 'Post successfully updated.');
 
        $this->redirect('/grupos');
    }

    public function render()
    {

        return view('livewire.grupo.crear-grupo', [
            'users' => User::all(),
            'carreras' => Carrera::all(),
            'materias' => Materia::all(),
            'periodos' => Periodo::all(),
        ]);
    }

}
