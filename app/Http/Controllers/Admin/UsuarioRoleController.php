<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioRoleController extends Controller
{
    public function index()
    {
        return view('admin.role.usuario.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Asignar Roles' => ''
            ]
        ]);
    }
}
