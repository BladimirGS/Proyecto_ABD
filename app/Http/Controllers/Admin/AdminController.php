<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct() 
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin.index')) {
                // Tienes permiso admin, continúa normalmente
                return $next($request);
            }

            if (Gate::allows('docentes.index')) {
                // No tienes permiso admin pero sí docente, redirige ahí
                return redirect()->route('docentes.index');
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
        return view('admin.index');
    }
}
