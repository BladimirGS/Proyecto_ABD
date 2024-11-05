<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocenteGrupoActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Grupo $grupo)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
        
        return view('docente.grupo.actividad.index', [
            'grupo' => $grupo, 
            'actividades' => Actividad::where('periodo_id', $grupo->periodo_id)->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo, Actividad $actividad)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
        
        $archivoExistente = Archivo::where('grupo_id', $grupo->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        $comentario = Comentario::where('grupo_id', $grupo->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        return view('docente.grupo.actividad.show', compact('grupo', 'actividad', 'archivoExistente', 'comentario'));
    }

    public function descargar(Grupo $grupo, Actividad $actividad, Archivo $archivo)
    {
        // Verificar si el grupo pertenece al usuario autenticado
        if ($grupo->user_id !== Auth::user()->id) {
            return redirect()->route('docentes.index');
        }
        
        // Busca el archivo por su ID
        $archivo = Archivo::where('id', $archivo->id)
            ->where('grupo_id', $grupo->id)
            ->where('actividad_id', $actividad->id)
            ->firstOrFail();

        return Storage::download($archivo->documento, $archivo->nombre);
    }

    public function subir(Request $request, Grupo $grupo, Actividad $actividad)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:20840',
        ]);
        
        $archivo = $request->file('archivo');
        
        // Si existe un archivo asociado, eliminarlo
        $archivoExistente = Archivo::where('grupo_id', $grupo->id)
            ->where('actividad_id', $actividad->id)
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
            'actividad_id' => $actividad->id,
        ]);

        return redirect()
            ->route('docente.grupo.actividades.show', ['grupo' => $grupo, 'actividad' => $actividad])
            ->with('status', 'Archivo subido exitosamente.');
    }
}
