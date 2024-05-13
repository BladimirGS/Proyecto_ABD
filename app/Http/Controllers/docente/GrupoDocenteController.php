<?php

namespace App\Http\Controllers\docente;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::where('user_id', auth()->user()->id)->get();
    
        // Asignar colores aleatorios a los grupos
        $colores = ['#f44336', '#e91e63', '#9c27b0', '#673ab7', '#ff9800', '#03a9f4', '#4caf50', '#ffeb3b', '#795548', '#9e9e9e', '#607d8b'];
        foreach ($grupos as $grupo) {
            $grupo->color = $colores[array_rand($colores)];
        }
    
        // Agrupar los grupos por el nombre de la carrera universitaria
        $gruposPorCarrera = $grupos->groupBy('carrera.nombre');
    
        return view('docente.index', compact('gruposPorCarrera'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
