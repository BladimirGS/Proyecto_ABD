<?php

namespace App\Http\Controllers\docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GrupoDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth()->user()->id; // Obtener el user_id del usuario autenticado
    
        // Obtener el ID del último registro de periodo para el usuario autenticado
        $ultimoPeriodoId = Periodo::orderBy('id', 'desc')->value('id');
    
        // Obtener los grupos del usuario autenticado que tienen el ID del último registro de periodo
        $grupos = Grupo::where('user_id', $user_id)
            ->where('periodo_id', $ultimoPeriodoId)
            ->get();
    
        // Agrupar los grupos por el nombre de la carrera universitaria
        $gruposPorCarrera = $grupos->groupBy('carrera.nombre');
    
        // Obtener el número total de actividades completadas para cada grupo
        $actividadesCompletadas = [];
        foreach ($grupos as $grupo) {
            $actividadesCompletadas[$grupo->id] = Archivo::where('grupo_id', $grupo->id)
                ->distinct('activity_id')
                ->count('activity_id');
        }
    
        return view('docente.index', compact('gruposPorCarrera', 'actividadesCompletadas'));
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
