<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Paginación para notificaciones no leídas (5 por página)
        $notificacionesNoLeidas = auth()->user()->unreadNotifications()->latest()->paginate(5);

        // Paginación para notificaciones leídas (5 por página)
        $notificacionesLeidas = auth()->user()->readNotifications()->latest()->paginate(5);        
        
        // Marcar como leídas las notificaciones no leídas
        $notificacionesNoLeidas->markAsRead();
    
        return view('notificaciones.index', [
            'notificacionesNoLeidas' => $notificacionesNoLeidas,
            'notificacionesLeidas' => $notificacionesLeidas,
        ]);
    }    
}
