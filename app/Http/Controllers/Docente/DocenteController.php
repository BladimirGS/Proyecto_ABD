<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DocenteController extends Controller
{
    public function __construct() 
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('docentes.index')) {
                // Tienes permiso admin, continúa normalmente
                return $next($request);
            }

            if (Gate::allows('admin.index')) {
                // No tienes permiso admin pero sí docente, redirige ahí
                return redirect()->route('admin.index');
            }

            // No tienes permisos ni admin ni docente, aborta con 403
            abort(403, 'No tiene permisos para acceder a esta sección.');
        });
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
                ->distinct('actividad_id')
                ->count('actividad_id');
        }
    
        return view('docente.index', compact('gruposPorCarrera', 'actividadesCompletadas'));
    }
}
