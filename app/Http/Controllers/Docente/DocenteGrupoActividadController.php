<?php

namespace App\Http\Controllers\Docente;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Actividad;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
    
        DB::beginTransaction();
    
        try {
            $archivo = $request->file('archivo');
    
            // Generar el nombre del directorio
            $carpetaUsuario = $grupo->user->nombre . '_' . $grupo->user->apellido;
            $carpetaUsuario = str_replace([' ', '/', '\\'], '_', $carpetaUsuario); // Normaliza caracteres no válidos
            $grupoPeriodo = $grupo->clave . '_' . $grupo->periodo->nombre;
            $grupoPeriodo = str_replace([' ', '/', '\\'], '_', $grupoPeriodo); // Normaliza caracteres no válidos
            $directorio = 'archivos/' . $carpetaUsuario . '/' . $grupoPeriodo;
    
            // Subir el nuevo archivo
            $documento = Storage::put($directorio, $archivo);
    
            // Actualizar o crear el registro en la base de datos
            $archivoExistente = Archivo::where('grupo_id', $grupo->id)
                ->where('actividad_id', $actividad->id)
                ->first();
    
            if ($archivoExistente) {
                // Eliminar el archivo físico si existe
                if (Storage::exists($archivoExistente->documento)) {
                    Storage::delete($archivoExistente->documento);
                }
    
                // Actualizar el registro existente
                $archivoExistente->update([
                    'nombre' => $archivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $documento,
                ]);
            } else {
                // Crear un nuevo registro
                Archivo::create([
                    'nombre' => $archivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $documento,
                    'grupo_id' => $grupo->id,
                    'actividad_id' => $actividad->id,
                ]);
            }
    
            DB::commit();
    
            return redirect()
                ->back()
                ->with('status', 'Archivo subido exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
    
            return redirect()
                ->back()
                ->withErrors('Ocurrió un error al subir el archivo. Por favor, inténtalo de nuevo.');
        }
    }
}
