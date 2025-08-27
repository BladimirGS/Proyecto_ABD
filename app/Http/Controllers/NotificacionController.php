<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        $limit = 5;

        // 🔹 No leídas
        $notificacionesNoLeidas = auth()->user()
            ->unreadNotifications()
            ->latest()
            ->take($limit)
            ->get()
            ->filter(function ($n) {
                $grupoUserId = $n->data['grupoUser']['id'] ?? null;
                $actividadId = $n->data['actividad']['id'] ?? null;

                $grupoUser = $grupoUserId ? \App\Models\GrupoUser::find($grupoUserId) : null;
                $actividad = $actividadId ? \App\Models\Actividad::find($actividadId) : null;

                // Si no existen, borrar la notificación y excluirla de la colección
                if (!$grupoUser || !$actividad) {
                    $n->delete();
                    return false;
                }

                return true;
            })
            ->map(function ($n) {
                return [
                    'id' => $n->id,
                    'data' => $n->data,
                    'created_at' => $n->created_at->diffForHumans(),
                    'read_at' => $n->read_at,
                ];
            });

        // 🔹 Leídas
        $notificacionesLeidas = auth()->user()
            ->readNotifications()
            ->latest()
            ->take($limit)
            ->get()
            ->filter(function ($n) {
                $grupoUserId = $n->data['grupoUser']['id'] ?? null;
                $actividadId = $n->data['actividad']['id'] ?? null;

                $grupoUser = $grupoUserId ? \App\Models\GrupoUser::find($grupoUserId) : null;
                $actividad = $actividadId ? \App\Models\Actividad::find($actividadId) : null;

                if (!$grupoUser || !$actividad) {
                    $n->delete();
                    return false;
                }

                return true;
            })
            ->map(function ($n) {
                return [
                    'id' => $n->id,
                    'data' => $n->data,
                    'created_at' => $n->created_at->diffForHumans(),
                    'read_at' => $n->read_at,
                ];
            });

        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $notificacionesNoLeidas,
            'notificacionesLeidas'   => $notificacionesLeidas,
            'breadcrumbs' => [
                'Inicio' => route('docentes.index'),
                'Administrar Notificaciones' => ''
            ],
            'limit' => $limit,
        ]);
    }


    // Ruta AJAX
    public function cargarMas(Request $request)
    {
        $tipo = $request->get('tipo', 'no-leidas');
        $offset = (int) $request->get('offset', 0);

        $query = $tipo === 'leidas'
            ? auth()->user()->readNotifications()
            : auth()->user()->unreadNotifications();

        $notificaciones = $query->latest()
            ->skip($offset)
            ->take(5)
            ->get()
            ->filter(function ($n) {
                $grupoUserId = $n->data['grupoUser']['id'] ?? null;
                $actividadId = $n->data['actividad']['id'] ?? null;

                $grupoUser = $grupoUserId ? \App\Models\GrupoUser::find($grupoUserId) : null;
                $actividad = $actividadId ? \App\Models\Actividad::find($actividadId) : null;

                if (!$grupoUser || !$actividad) {
                    $n->delete();
                    return false;
                }

                return true;
            })
            ->map(function ($n) {
                return [
                    'id' => $n->id,
                    'data' => $n->data,
                    'created_at' => $n->created_at->diffForHumans(),
                    'read_at' => $n->read_at,
                ];
            });

        return response()->json($notificaciones);
    }
}
