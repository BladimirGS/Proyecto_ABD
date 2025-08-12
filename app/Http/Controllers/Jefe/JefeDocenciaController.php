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
    public function index()
    {
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

public function evaluar(Request $request, Archivo $archivo)
{
    $request->validate([
        'estado' => 'required|in:Aprobado,Rechazado,Pendiente',
        'comentario' => 'required_if:estado,Rechazado',
        'archivo' => 'required_if:estado,Aprobado|nullable|file|mimes:pdf,doc,docx|max:20840',
    ]);

    DB::beginTransaction();

    try {
        // 1. Guardar o actualizar comentario (con user autenticado)
        if (!empty($request->comentario)) {
            Comentario::updateOrCreate(
                [
                    'grupo_user_id' => $archivo->grupo_user_id,
                    'actividad_id' => $archivo->actividad_id,
                ],
                [
                    'comentario' => $request->comentario,
                    'user_id' => auth()->id(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                ]
            );
        }

        // 2. Actualizar estado del archivo original (docente)
        $archivo->update([
            'estado' => $request->estado,
        ]);

        // 3. Si se sube archivo firmado (y estado aprobado)
        if ($request->hasFile('archivo')) {
            if ($request->estado !== 'Aprobado') {
                return redirect()->back()->withErrors('Solo puede subir archivo firmado si el estado es "Aprobado".');
            }

            $nuevoArchivo = $request->file('archivo');

            // Buscar archivo firmado existente para el jefe (user_id = auth()->id())
            $archivoFirmado = Archivo::where('grupo_user_id', $archivo->grupo_user_id)
                ->where('actividad_id', $archivo->actividad_id)
                ->where('user_id', auth()->id())
                ->first();

            // Construir ruta para guardar archivo firmado
            $jefe = auth()->user();
            $grupoUser = $archivo->grupoUser;
            $grupo = $grupoUser->grupo;
            $periodo = $grupoUser->periodo;

            $carpetaUsuario = str_replace([' ', '/', '\\'], '_', "{$jefe->nombre}_{$jefe->apellido}");
            $grupoPeriodo = str_replace([' ', '/', '\\'], '_', "{$grupo->clave}_{$periodo->nombre}");
            $directorio = "archivos/{$carpetaUsuario}/{$grupoPeriodo}";

            $path = Storage::put($directorio, $nuevoArchivo);

            if ($archivoFirmado) {
                // Eliminar archivo firmado anterior si existe
                if (Storage::exists($archivoFirmado->documento)) {
                    Storage::delete($archivoFirmado->documento);
                }

                // Actualizar archivo firmado existente
                $archivoFirmado->update([
                    'nombre' => $nuevoArchivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $path,
                    'estado' => 'Firmado',
                ]);
            } else {
                // Crear nuevo archivo firmado
                Archivo::create([
                    'nombre' => $nuevoArchivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $path,
                    'user_id' => $jefe->id,
                    'grupo_user_id' => $archivo->grupo_user_id,
                    'actividad_id' => $archivo->actividad_id,
                    'estado' => 'Firmado',
                ]);
            }
        }

        // 4. Notificar al docente
        $archivo->grupoUser->user->notify(new EvaluarActividad($archivo));

        DB::commit();

        return redirect()->back()->with('status', 'Evaluación guardada exitosamente.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors('Ocurrió un error: ' . $e->getMessage());
    }
}

}
