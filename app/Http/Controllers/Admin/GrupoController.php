<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actividad;

class GrupoController extends Controller
{
    public function __construct() 
    {
        $this->middleware('can:grupos.index')->only('index');
        $this->middleware('can:grupos.create')->only('create');
        $this->middleware('can:grupos.edit')->only('edit');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.grupo.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grupo.create', [
            // 'users' => User::all(),
            'carreras' => Carrera::where('activo', true)->get(),
            'materias' => Materia::where('activo', true)->get(),
            // 'periodos' => Periodo::where('activo', true)->get(),
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
            // 'user_id' => 'required',
            'carrera_id' => 'required',
            'materia_id' => 'required',
            // 'periodo_id' => 'required',
        ]);
    
        // Obtener un color aleatorio de la lista de colores
        $colorAleatorio = Arr::random(['#6b7280', '#ef4444', '#f97316', '#10b981', '#14b8a6', '#0ea5e9', '#3b82f6']);
    
        $grupo = Grupo::create([
            'clave' => $datos['clave'],
            'semestre' => $datos['semestre'],
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
            'color' => $colorAleatorio
        ]);
    
        return redirect()->route('grupos.index')->with('status', 'Operación exitosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        return view('admin.grupo.show', ['grupo' => $grupo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        return view('admin.grupo.edit', [
            'grupo' => $grupo,
            'carreras' => Carrera::where('activo', true)->get(),
            'materias' => Materia::where('activo', true)->get(),
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
        ]);

        // Se actualiza el grupo
        $grupo->update($datos);

        // Redireccionar
        return redirect()->route('grupos.index')->with('status', 'Operación exitosa');
    }
}

