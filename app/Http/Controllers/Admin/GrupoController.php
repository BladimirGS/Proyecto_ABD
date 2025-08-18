<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.grupo.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Administrar Grupos' => ''
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.grupo.create', [
            'carreras' => Carrera::where('activo', true)->get(),
            'materias' => Materia::where('activo', true)->get(),
        ], [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Administrar Grupos' => route('grupos.index'),
                'Crear Grupos' => ''
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $this->validate($request, [
            'clave' => 'required',
            'semestre' => 'required|integer',
            'carrera_id' => 'required',
            'materia_id' => 'required',
        ]);

        $grupo = Grupo::create([
            'clave'      => mb_strtoupper($datos['clave'], 'UTF-8'),
            'semestre'   => $datos['semestre'],
            'carrera_id' => $datos['carrera_id'],
            'materia_id' => $datos['materia_id'],
        ]);

        // Generar color usando id + clave
        $grupo->color = Grupo::generarColor($grupo->clave, $grupo->id);
        $grupo->save();
        
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
        ], [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Administrar Grupos' => route('grupos.index'),
                'Editar Grupos' => ''
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        $datos = $this->validate($request, [
            'clave' => 'required',
            'semestre' => 'required|integer',
            'carrera_id' => 'required',
            'materia_id' => 'required',
        ]);

        $datos['clave'] = mb_strtoupper($datos['clave'], 'UTF-8');

        $grupo->update($datos);

        return redirect()->route('grupos.index')->with('status', 'Operación exitosa');
    }
}
