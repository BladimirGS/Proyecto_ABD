<?php

namespace App\Http\Controllers\Jefe;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Actividad;
use App\Models\GrupoUser;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\EvaluarActividad;
use Illuminate\Support\Facades\Storage;

class JefeDocenciaController extends Controller
{
    public function index() {
        return view('jefe.index');
    }

    
public function show(Archivo $archivo)
{
    // Obtenemos el modelo GrupoUser
    $grupoUser = $archivo->grupoUser()->with('grupo', 'user')->firstOrFail();

    $actividad = Actividad::findOrFail($archivo->actividad_id);

    $comentario = Comentario::where('grupo_user_id', $grupoUser->id)
                            ->where('actividad_id', $actividad->id)
                            ->first();

    return view('jefe.show', [
        'grupoUser' => $grupoUser,
        'actividad' => $actividad,
        'archivo' => $archivo,
        'comentario' => $comentario
    ]);
}

    public function evaluar(Archivo $archivo, Request $request)
    {
        $datos = $request->validate([
            'estado' => 'required|in:Aprobado,Rechazado,Pendiente',
            'comentario' => 'required_if:estado,Rechazado', // Comentario requerido si es "rechazado"
        ]);
    
        // Crear o actualizar el comentario solo si se proporciona
        if (!empty($datos['comentario'])) {
            Comentario::updateOrCreate(
                [
                    'grupo_user_id' => $archivo->grupo_user_id,
                    'actividad_id' => $archivo->actividad_id,
                ],
                [
                    'comentario' => $datos['comentario'],
                ]
            );
        }
    
        // Actualizar el estado del archivo
        $archivo->update(['estado' => $datos['estado']]);

        $archivo->grupo->user->notify(new EvaluarActividad($archivo));
    
        return redirect()->back()->with('status', 'Evaluación guardada exitosamente.');
    }

    
    public function subir(Request $request, Grupo $grupo, Actividad $actividad)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:20840',
        ]);
    
        DB::beginTransaction();
    
        try {
            $archivo = $request->file('archivo');
    
            // Si existe un archivo asociado, eliminarlo
            $archivoExistente = Archivo::where('grupo_id', $grupo->id)
                ->where('actividad_id', $actividad->id)
                ->first();
    
            if ($archivoExistente) {
                if (Storage::exists($archivoExistente->documento)) {
                    Storage::delete($archivoExistente->documento);
                }
                $archivoExistente->delete();
            }
    
            // Generar el nombre del directorio
            $directorio = 'archivos/' . $grupo->user->nombre . '_' . $grupo->user->apellido . '/' . $grupo->clave . '_' . $grupo->periodo->nombre;
            $directorio = str_replace([' ', '/', '\\'], '_', $directorio); // Normaliza caracteres no válidos
    
            // Subir el nuevo archivo
            $documento = Storage::put($directorio, $archivo);
    
            // Crear o actualizar el registro en la base de datos
            Archivo::updateOrCreate(
                [
                    'grupo_id' => $grupo->id,
                    'actividad_id' => $actividad->id,
                ],
                [
                    'nombre' => $archivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $documento,
                ]
            );
    
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
