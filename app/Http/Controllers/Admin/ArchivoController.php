<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Revision;
use App\Models\Actividad;
use App\Models\GrupoUser;
use App\Models\Comentario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\EvaluarActividad;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ArchivoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return view('admin.archivo.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Evaluar Actividades' => ''
            ]
        ]);
    }

    public function show(Archivo $archivo)
    {
        if ($archivo->estado == 'Firmado') {
            return redirect()->route('archivos.index');
        } else if ($archivo->actividad->firma == true) {
            return redirect()->route('archivos.index');
        }

        $grupoUser = GrupoUser::find($archivo->grupo_user_id);
        $actividad = Actividad::find($archivo->actividad_id);
        $comentario = Comentario::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        return view('admin.archivo.show', [
            'grupoUser' => $grupoUser,
            'actividad' => $actividad,
            'archivo' => $archivo,
            'comentario' => $comentario,
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Evaluar Actividades' => route('archivos.index'),
                'Grupo ' . $grupoUser->grupo->clave => ''
            ]
        ]);
    }

    public function evaluar(Archivo $archivo, Request $request)
    {
        $datos = $request->validate([
            'estado' => 'required|in:Aprobado,Rechazado,Pendiente',
            'comentario' => 'required_if:estado,Rechazado',
        ]);

        // Crear o actualizar el comentario
        if (!empty($datos['comentario'])) {
            Comentario::updateOrCreate(
                [
                    'grupo_user_id' => $archivo->grupo_user_id,
                    'actividad_id' => $archivo->actividad_id,
                ],
                [
                    'comentario' => $datos['comentario'],
                    'fecha' => now(),
                    'user_id' => auth()->id(),
                ]
            );
        }

        // Actualizar el estado del archivo
        $archivo->update(['estado' => $datos['estado']]);

        // Notificar al usuario
        $archivo->grupoUser->user->notify(new EvaluarActividad($archivo));

        return redirect()->back()->with('status', 'Evaluación guardada exitosamente.');
    }

    public function verArchivo(Archivo $archivo)
    {
        if (!Storage::exists($archivo->documento)) {
            abort(404, 'El archivo no existe.');
        }

        return new StreamedResponse(function () use ($archivo) {
            $stream = Storage::readStream($archivo->documento);
            fpassthru($stream);
            fclose($stream);
        }, 200, [
            'Content-Type' => Storage::mimeType($archivo->documento),
            'Content-Disposition' => 'inline; filename="' . $archivo->nombre . '"',
        ]);
    }

    public function eliminarArchivo(Archivo $archivo, Request $request)
    {
        $redirectUrl = $request->input('redirectUrl');

        if ($archivo->user_id !== auth()->id()) {
            return redirect($redirectUrl ?? url()->previous())
                ->with('error-eliminar', 'No se puede eliminar el archivo: no eres el propietario.');
        }

        if (!$archivo->actividad || !$archivo->actividad->activo) {
            return redirect($redirectUrl ?? url()->previous())
                ->with('error-eliminar', 'No se puede eliminar el archivo: la actividad no está activa.');
        }

        $archivo->delete();

        return redirect($redirectUrl ?? url()->previous())
            ->with('status', 'Archivo eliminado correctamente.');
    }

    public function EliminarComentario(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->back()->with('status', 'Comentario eliminado correctamente.');
    }
}
