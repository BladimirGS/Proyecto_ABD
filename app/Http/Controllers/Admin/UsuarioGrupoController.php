<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsuarioGrupoController extends Controller
{
    public function index()
    {
        return view('admin.grupo.usuario.index');
    }
}
