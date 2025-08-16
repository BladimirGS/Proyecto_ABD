<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Periodo;
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
        $usuario = auth()->user();
        $ultimoPeriodoId = Periodo::orderByDesc('id')->value('id');

        // Obtenemos registros de grupo_user del usuario para el último periodo
        $grupoUsers = GrupoUser::with(['grupo.materia', 'grupo.carrera'])
            ->where('user_id', $usuario->id)
            ->where('periodo_id', $ultimoPeriodoId)
            ->get();

        // Agrupamos por carrera desde la relación grupo.carrera
        $gruposPorCarrera = $grupoUsers->groupBy(fn($gu) => $gu->grupo->carrera->nombre ?? 'Sin carrera');

        // Actividades completadas por grupo
        $actividadesCompletadas = [];
        // foreach ($grupoUsers as $grupoUser) {
        //     $grupoId = $grupoUser->grupo_id;

        //     $actividadesCompletadas[$grupoId] = Archivo::where('grupo_id', $grupoId)
        //         ->distinct('actividad_id')
        //         ->count('actividad_id');
        // }

        return view(
            'docente.index',
            compact('gruposPorCarrera', 'actividadesCompletadas'),
            [
                'breadcrumbs' => [
                    'Inicio' => route('docentes.index'),
                    'Tablero de Grupos' => ''
                ]
            ]
        );
    }
}
