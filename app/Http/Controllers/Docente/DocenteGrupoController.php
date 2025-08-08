<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GrupoUser;
use Illuminate\Support\Facades\Auth;

class DocenteGrupoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('docente.grupo.index', ['usuario' => Auth::user()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoUser $grupoUser)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupoUser->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
    
        return view('docente.grupo.show', ['grupoUser' => $grupoUser]);
    }
}
