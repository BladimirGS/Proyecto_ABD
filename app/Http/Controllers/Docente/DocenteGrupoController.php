<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DocenteGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('docente.grupo.index', ['usuario' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docente.grupo.create', [
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
            'carrera_id' => 'required',
            'materia_id' => 'required',
            'periodo_id' => 'required',
        ]);
    
        // Obtener un color aleatorio de la lista de colores
        $colorAleatorio = Arr::random(['#6b7280', '#ef4444', '#f97316', '#10b981', '#14b8a6', '#0ea5e9', '#3b82f6']);
    
        Grupo::create([
            'clave' => $datos['clave'],
            'semestre' => $datos['semestre'],
            'user_id' => Auth::user()->id,
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
            'periodo_id' => $datos['periodo_id'],
            'color' => $colorAleatorio, // Asignar el color aleatorio al grupo
        ]);
    
        return redirect()->route('docente.grupos.index')->with('status', 'Operación exitosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
    
        return view('docente.grupo.show', ['grupo' => $grupo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
    
        return view('docente.grupo.edit', [
            'grupo' => $grupo,
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
            'carrera_id' => 'required',
            'materia_id' => 'required',
            'periodo_id' => 'required',
        ]);

        // Se actualiza el usuario
        $grupo->update($datos);

        // Redireccionar
        return redirect()->route('docente.grupos.index')->with('status', 'Operación exitosa');
    }
}
