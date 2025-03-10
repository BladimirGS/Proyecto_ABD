<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Actividad;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\EvaluarActividad;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('admin.archivo.index');
    }

    public function show(Archivo $archivo)
    {
        $grupo = Grupo::find($archivo->grupo_id);
        $actividad = Actividad::find($archivo->actividad_id);
        $comentario = Comentario::where('grupo_id', $grupo->id)
                                ->where('actividad_id', $actividad->id)
                                ->first(); // Cambiado a first()
    
        return view('admin.archivo.show', [
            'grupo' => $grupo,
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
                    'grupo_id' => $archivo->grupo_id,
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

    public function verArchivo(Archivo $file)
    {
        // Obtener la ruta del archivo en el almacenamiento
        $rutaArchivo = Storage::path($file->documento);

        // Verificar si el archivo existe antes de enviarlo
        if (!Storage::exists($file->documento)) {
            abort(404, 'El archivo no existe');
        }

        // Retornar el archivo para visualizarlo en el navegador
        return response()->file($rutaArchivo, [
            'Content-Disposition' => 'inline',
            'Content-Type' => mime_content_type($rutaArchivo),
        ]);
    }
}
