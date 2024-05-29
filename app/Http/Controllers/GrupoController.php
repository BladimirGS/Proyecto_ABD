<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Activity;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grupo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupo.create', [
            'users' => User::all(),
            'carreras' => Carrera::where('activo', true)->get(),
            'materias' => Materia::where('activo', true)->get(),
            'periodos' => Periodo::where('activo', true)->get(),
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
    
        // Obtener un color aleatorio de la lista de colores
        $colorAleatorio = Arr::random(['#6b7280', '#ef4444', '#f97316', '#10b981', '#14b8a6', '#0ea5e9', '#3b82f6']);
    
        Grupo::create([
            'clave' => $datos['clave'],
            'semestre' => $datos['semestre'],
            'user_id' => $datos['user_id'],
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
            'periodo_id' => $datos['periodo_id'],
            'color' => $colorAleatorio, // Asignar el color aleatorio al grupo
        ]);
    
        return redirect()->route('grupos.index')->with('status', 'Operación exitosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        return view('grupo.show', [
            'grupo' => $grupo, 
            'actividades' => Activity::where('periodo_id', $grupo->periodo_id)->get()
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
            'carreras' => Carrera::where('activo', true)->get(),
            'materias' => Materia::where('activo', true)->get(),
            'periodos' => Periodo::where('activo', true)->get(),
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
        return redirect()->route('grupos.index')->with('status', 'Operación exitosa');
    }
        /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);
        $grupo->delete();
        return back()->with('status', 'Operación exitosa');
    }
}
