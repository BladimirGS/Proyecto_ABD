<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Periodo;
use App\Models\Actividad;
use App\Models\GrupoUser;
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
    $usuarioId = auth()->id();
    $ultimoPeriodoId = Periodo::orderByDesc('id')->value('id');

    $gruposUser = GrupoUser::with('grupo.materia')
        ->where('user_id', $usuarioId)
        ->where('periodo_id', $ultimoPeriodoId)
        ->get();

    $progreso = [];
    foreach ($gruposUser as $grupoUser) {
        $grupoUserId = $grupoUser->id;

        // total de actividades en el periodo
        $total = Actividad::where('periodo_id', $grupoUser->periodo_id)->count();

        // actividades con archivo subido por el docente (no firmado)
        $completadas = Archivo::where('grupo_user_id', $grupoUserId)
            ->where('estado', '!=', 'firmado')
            ->distinct('actividad_id')
            ->count('actividad_id');

        // actividades que ya tienen al menos un archivo aprobado
        $aprobadas = Archivo::where('grupo_user_id', $grupoUserId)
            ->where('estado', 'aprobado')
            ->distinct('actividad_id')
            ->count('actividad_id');

        $progreso[$grupoUserId] = [
            'total' => $total,
            'completadas' => $completadas,
            'aprobadas' => $aprobadas,
        ];
    }

    return view(
        'docente.index',
        compact('gruposUser', 'progreso'),
        [
            'breadcrumbs' => [
                'Inicio' => route('docentes.index'),
                'Tablero de Grupos' => ''
            ]
        ]
    );
}

}
