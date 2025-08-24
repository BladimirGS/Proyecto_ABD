<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    public function __invoke(Request $request)
    {
        $notificacionesNoLeidas = auth()->user()->unreadNotifications()->latest()->get();
        $notificacionesLeidas = auth()->user()->readNotifications()->latest()->get();

        // Marcar como leídas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $notificacionesNoLeidas,
            'notificacionesLeidas' => $notificacionesLeidas,
            'breadcrumbs' => [
                'Inicio' => route('docentes.index'),
                'Administrar Notificaciones' => ''
            ]
        ]);
    }

    // Ruta AJAX para cargar más notificaciones
    public function cargarMas(Request $request)
    {
        $tipo = $request->input('tipo', 'no-leidas'); // 'no-leidas' o 'leidas'
        $offset = (int)$request->input('offset', 0);
        $limit = 5;

        $query = $tipo === 'leidas'
            ? auth()->user()->readNotifications()->latest()
            : auth()->user()->unreadNotifications()->latest();

        $notificaciones = $query->skip($offset)->take($limit)->get();

        return response()->json($notificaciones);
    }
}
