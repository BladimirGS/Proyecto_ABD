<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('admin.carrera.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Administrar Carreras' => ''
            ]
        ]);
    }
}
