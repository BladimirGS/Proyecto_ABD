<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    public function show(Grupo $grupo)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
    
        return view('docente.grupo.show', ['grupo' => $grupo]);
    }
}
