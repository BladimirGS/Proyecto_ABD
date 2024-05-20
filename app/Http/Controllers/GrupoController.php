<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Activity;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupo.create', [
            'users' => User::all(),
            'carreras' => Carrera::all(),
            'materias' => Materia::all(),
            'periodos' => Periodo::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $this->validate($request, [
            'clave' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
            'carrera_id' => 'required',
            'materia_id' => 'required',
            'periodo_id' => 'required',
        ]);

        Grupo::create([
            'clave' => $datos['clave'],
            'semestre' => $datos['semestre'],
            'user_id' => $datos['user_id'],
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
            'periodo_id' => $datos['periodo_id'],
        ]);
 
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        return view('grupo.show', [
            'grupo' => $grupo, 
            'actividades' => Activity::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        return view('grupo.edit', [
            'grupo' => $grupo,
            'users' => User::all(),
            'carreras' => Carrera::all(),
            'materias' => Materia::all(),
            'periodos' => Periodo::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $datos = $this->validate($request, [
            'clave' => 'required',
            'semestre' => 'required',
            'user_id' => 'required',
            'carrera_id' => 'required',
            'materia_id' => 'required',
            'periodo_id' => 'required',
        ]);

        // Se actualiza el usuario
        $grupo->update($datos);

        // Redireccionar
        return redirect()->route('grupos.index');
    }
}
