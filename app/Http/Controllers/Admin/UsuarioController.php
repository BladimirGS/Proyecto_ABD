<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.usuario.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Administar Usuarios' => ''
            ]
        ]);
    }
}
