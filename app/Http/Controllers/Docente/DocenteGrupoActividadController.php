<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DocenteGrupoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Grupo $grupo)
    {
        return view('docente.grupo.actividad.index', [
            'grupo' => $grupo, 
            'actividades' => Activity::where('periodo_id', $grupo->periodo_id)->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo, Activity $actividad)
    {
        $archivoExistente = Archivo::where('grupo_id', $grupo->id)
            ->where('activity_id', $actividad->id)
            ->first();

        return view('docente.grupo.actividad.show', compact('grupo', 'actividad', 'archivoExistente'));
    }

    public function descargar($grupoId, $actividadId, $archivoId)
    {
        // Busca el archivo por su ID
        $archivo = Archivo::where('id', $archivoId)
            ->where('grupo_id', $grupoId)
            ->where('activity_id', $actividadId)
            ->firstOrFail();

        return Storage::download($archivo->documento, $archivo->nombre);
    }

    public function subir(Request $request, Grupo $grupo, Activity $actividad)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf|max:20840',
        ]);
        
        $archivo = $request->file('archivo');
        
        // Si existe un archivo asociado, eliminarlo
        $archivoExistente = Archivo::where('grupo_id', $grupo->id)
            ->where('activity_id', $actividad->id)
            ->first();

        if ($archivoExistente) {
            Storage::delete($archivoExistente->documento);
            $archivoExistente->delete();
        }

        $directorio = 'archivos/' . $grupo->user->nombre . '_' . $grupo->user->apellido . '/' . $grupo->clave . '_' . $grupo->periodo->nombre;
        $directorio = str_replace(' ', '_', $directorio); // Reemplaza caracteres no permitidos

        // Subir el nuevo archivo
        $documento = Storage::put($directorio, $archivo);

        // Crear una nueva instancia de Archivo y guardarla en la base de datos
        Archivo::create([
            'nombre' => $archivo->getClientOriginalName(),
            'fecha' => now()->setTimezone(config('app.timezone')),
            'documento' => $documento,
            'grupo_id' => $grupo->id,
            'activity_id' => $actividad->id,
        ]);

        return redirect()
            ->route('docente.grupo.actividades.show', ['grupo' => $grupo, 'actividad' => $actividad])
            ->with('status', 'Archivo subido exitosamente.');
    }
}
