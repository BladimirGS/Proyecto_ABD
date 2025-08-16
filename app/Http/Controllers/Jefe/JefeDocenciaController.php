<?php

namespace App\Http\Controllers\Jefe;

use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Revision;
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
        return view('jefe.index', [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Evaluar actividades' => ''
            ]
        ]);
    }

    public function show(Archivo $archivo)
    {
        // Obtenemos el modelo GrupoUser
        $grupoUser = $archivo->grupoUser()->with('grupo', 'user')->firstOrFail();

        $actividad = Actividad::findOrFail($archivo->actividad_id);

        $comentario = Comentario::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        $archivoFirmado = Archivo::where('grupo_user_id', $archivo->grupo_user_id)
            ->where('actividad_id', $archivo->actividad_id)
            ->where('estado', 'Firmado')
            ->first();

        return view(
            'jefe.show',
            [
                'grupoUser' => $grupoUser,
                'actividad' => $actividad,
                'archivo' => $archivo,
                'comentario' => $comentario,
                'archivoFirmado' => $archivoFirmado
            ],
            [
                'breadcrumbs' => [
                    'Inicio' => route('admin.index'),
                    'Evaluar actividades' => route('firma.index'),
                    'Grupo ' . $grupoUser->grupo->clave => ''
                ]
            ]
        );
    }

    public function evaluar(Request $request, Archivo $archivo)
    {
        $request->validate([
            'estado' => 'required|in:Aprobado,Rechazado,Pendiente',
            'comentario' => 'required_if:estado,Rechazado',
            'archivo' => 'required_if:estado,Aprobado|nullable|file|mimes:pdf,doc,docx|max:20840',
        ]);

        if ($request->hasFile('archivo') && $request->estado !== 'Aprobado') {
            return redirect()->back()->with(
                'error_estado',
                'Solo puede subir archivo firmado si el estado es "Aprobado".'
            );
        }

        DB::beginTransaction();

        try {
            if (!empty($request->comentario)) {
                Comentario::updateOrCreate(
                    [
                        'grupo_user_id' => $archivo->grupo_user_id,
                        'actividad_id' => $archivo->actividad_id,
                    ],
                    [
                        'comentario' => $request->comentario,
                        'user_id' => auth()->id(),
                        'fecha' => now(),
                    ]
                );
            }

            Revision::create([
                'fecha' => now(),
                'descripcion' => '',
                'user_id' => auth()->id(),
                'grupo_user_id' => $archivo->grupo_user_id,
                'actividad_id' => $archivo->actividad_id,
            ]);

            $archivo->update([
                'estado' => $request->estado,
            ]);

            if ($request->hasFile('archivo')) {
                $nuevoArchivo = $request->file('archivo');

                $archivoFirmado = Archivo::where('grupo_user_id', $archivo->grupo_user_id)
                    ->where('actividad_id', $archivo->actividad_id)
                    ->where('user_id', auth()->id())
                    ->first();

                $usuario = auth()->user();
                $grupoUser = $archivo->grupoUser;
                $grupo = $grupoUser->grupo;
                $periodo = $grupoUser->periodo;

                $carpetaPeriodo = $this->generarHash($periodo->id);
                $carpetaUser    = $this->generarHash($usuario->id);
                $carpetaGrupo   = $this->generarHash($grupo->id);

                $directorio = "archivos/{$carpetaPeriodo}/{$carpetaUser}/{$carpetaGrupo}";
                $rutaDocumento = Storage::put($directorio, $nuevoArchivo);

                if ($archivoFirmado) {
                    if (Storage::exists($archivoFirmado->documento)) {
                        Storage::delete($archivoFirmado->documento);
                    }
                    $archivoFirmado->update([
                        'nombre' => $nuevoArchivo->getClientOriginalName(),
                        'fecha' => now(),
                        'documento' => $rutaDocumento,
                        'estado' => 'Firmado',
                    ]);
                } else {
                    Archivo::create([
                        'nombre' => $nuevoArchivo->getClientOriginalName(),
                        'fecha' => now(),
                        'documento' => $rutaDocumento,
                        'user_id' => $usuario->id,
                        'grupo_user_id' => $archivo->grupo_user_id,
                        'actividad_id' => $archivo->actividad_id,
                        'estado' => 'Firmado',
                    ]);
                }
            }

            $archivo->grupoUser->user->notify(new EvaluarActividad($archivo));

            DB::commit();

            return redirect()->back()->with('status', 'Evaluación guardada exitosamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Ocurrió un error: ' . $e->getMessage());
        }
    }

    private function generarHash($id)
    {
        return strtoupper(substr(md5($id), 0, 8)); // Ej: '8D969EEF'
    }
}
