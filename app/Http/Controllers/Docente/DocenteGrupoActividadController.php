<?php

namespace App\Http\Controllers\Docente;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Actividad;
use App\Models\GrupoUser;
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
    public function index(GrupoUser $grupoUser)
    {
        if ($grupoUser->user_id !== auth()->id()) {
            return redirect()->route('docentes.index');
        }

        return view(
            'docente.grupo.actividad.index',
            [
                'grupoUser' => $grupoUser,
                'grupo' => $grupoUser->grupo,
                'actividades' => Actividad::where('periodo_id', $grupoUser->periodo_id)->get(),
            ],
            [
                'breadcrumbs' => [
                    'Inicio' => route('docentes.index'),
                    'Tablero de Grupos' => route('docentes.index'),
                    'Lista de Actividades' => ''
                ]
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoUser $grupoUser, Actividad $actividad)
    {
        if ($grupoUser->user_id !== auth()->id()) {
            return redirect()->route('docentes.index');
        }

        $archivoExistente = Archivo::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->where('user_id', auth()->id())
            ->Where('estado', '<>', 'Firmado')
            ->first();

        $comentario = Comentario::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        $archivoFirmado = Archivo::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->where('estado', 'Firmado')
            ->first();

        return view(
            'docente.grupo.actividad.show',
            compact('grupoUser', 'actividad', 'archivoExistente', 'archivoFirmado', 'comentario'),
            [
                'breadcrumbs' => [
                    'Inicio' => route('docentes.index'),
                    'Tablero de Grupos' => route('docentes.index'),
                    'Lista de Actividades' => route('docente.grupo.actividades.index', $grupoUser),
                    'Grupo ' . $grupoUser->grupo->clave => ''
                ]
            ]
        );
    }

    public function subir(Request $request, GrupoUser $grupoUser, Actividad $actividad)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:20840',
        ]);

        DB::beginTransaction();

        try {
            $usuario = $grupoUser->user;
            $grupo   = $grupoUser->grupo;
            $periodo = $grupoUser->periodo;

            $archivoSubido = $request->file('archivo');

            $carpetaPeriodo = $this->generarHash($periodo->id);
            $carpetaUser    = $this->generarHash($usuario->id);
            $carpetaGrupo   = $this->generarHash($grupo->id);

            $directorio = "archivos/{$carpetaPeriodo}/{$carpetaUser}/{$carpetaGrupo}";
            $rutaDocumento = Storage::put($directorio, $archivoSubido);

            $archivoExistente = Archivo::where('grupo_user_id', $grupoUser->id)
                ->where('actividad_id', $actividad->id)
                ->where('user_id', $usuario->id)
                ->first();

            if ($archivoExistente) {
                if (Storage::exists($archivoExistente->documento)) {
                    Storage::delete($archivoExistente->documento);
                }

                $nuevoEstado = strtolower($archivoExistente->estado) === 'rechazado'
                    || strtolower($archivoExistente->estado) === 'aprobado'
                    ? 'Modificado'
                    : 'Pendiente';


                $archivoExistente->update([
                    'nombre'     => $archivoSubido->getClientOriginalName(),
                    'fecha'      => now(),
                    'user_id'       => auth()->id(),
                    'documento'  => $rutaDocumento,
                    'estado'     => $nuevoEstado,
                ]);
            } else {
                Archivo::create([
                    'nombre'        => $archivoSubido->getClientOriginalName(),
                    'fecha'         => now(),
                    'documento'     => $rutaDocumento,
                    'user_id'       => auth()->id(),
                    'grupo_user_id' => $grupoUser->id,
                    'actividad_id'  => $actividad->id,
                    'estado'        => 'Pendiente',
                ]);
            }

            DB::commit();

            return back()->with('status', 'Archivo subido correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Error al subir el archivo: ' . $e->getMessage());
        }
    }

    private function generarHash($id)
    {
        return strtoupper(substr(md5($id), 0, 8)); // Ej: '8D969EEF'
    }
}
