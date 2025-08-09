<?php

namespace App\Http\Controllers\Admin;

use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Imports\GruposImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class UsuarioGrupoController extends Controller
{
    public function index()
    {
        return view('admin.grupo.usuario.index');
    }

    public function formImportar()
    {
        $ultimoPeriodo = Periodo::orderBy('created_at', 'desc')->first();

        return view('admin.grupo.usuario.importar', compact('ultimoPeriodo'));
    }

    public function importarExcel(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:xlsx,xls'
        ]);

        $periodo = Periodo::orderBy('created_at', 'desc')->first();

        try {
            Excel::import(new GruposImport($periodo), $request->file('archivo'));

            return back()->with('status', 'Importación exitosa.');
        } catch (\Exception $e) {
            $errores = json_decode($e->getMessage(), true);
            return back()
                ->withErrors(['excel' => $errores])
                ->with('errores_excel', $errores); // para SweetAlert
        }
    }
}
