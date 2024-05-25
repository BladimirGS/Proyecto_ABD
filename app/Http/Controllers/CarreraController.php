<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carrera.index', [
            'carreras' => Carrera::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carrera.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $this->validate($request, [
            'nombre' => 'required',
        ]);

        Carrera::create([
            'nombre' => $datos['nombre'],
        ]);

        return redirect()->route('carreras.index')->with('status', 'Se registro la carrera');
    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        return view('carrera.edit', ['carrera' => $carrera]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        $datos = $this->validate($request, [
            'nombre' => 'required'
        ]);

        $carrera->update($datos);

        return redirect()->route('carreras.index')->with('status', 'Se actualizo carrectamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carrera = Carrera::findOrFail($id);
        $carrera->delete();
        return redirect()->route('carreras.index')->with('status', 'Carrera eliminada correctamente');
    }
    
}
