<?php

namespace App\Http\Controllers\Docente;

use App\Models\User;
use App\Models\Grupo;
use App\Models\Archivo;
use App\Models\Periodo;
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

        return view('docente.grupo.actividad.index', [
            'grupoUser' => $grupoUser,
            'grupo' => $grupoUser->grupo,
            'actividades' => Actividad::where('periodo_id', $grupoUser->periodo_id)->get(),
        ]);
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
            ->first();

        $comentario = Comentario::where('grupo_user_id', $grupoUser->id)
            ->where('actividad_id', $actividad->id)
            ->first();

        return view('docente.grupo.actividad.show', compact('grupoUser', 'actividad', 'archivoExistente', 'comentario'));
    }

    public function subir(Request $request, GrupoUser $grupoUser, Actividad $actividad)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx|max:20840',
        ]);

        DB::beginTransaction();

        try {
            if (!$grupoUser) {
                return redirect()->back()->withErrors('No se encontró la relación grupo-usuario.');
            }

            $grupo = Grupo::findOrFail($grupoUser->grupo_id);
            $usuario = $grupoUser->user;
            $periodo = $grupoUser->periodo;

            $archivo = $request->file('archivo');

            // Crear ruta del directorio
            $carpetaUsuario = $usuario->nombre . '_' . $usuario->apellido;
            $carpetaUsuario = str_replace([' ', '/', '\\'], '_', $carpetaUsuario);
            $grupoPeriodo = $grupo->clave . '_' . $periodo->nombre;
            $grupoPeriodo = str_replace([' ', '/', '\\'], '_', $grupoPeriodo);
            $directorio = 'archivos/' . $carpetaUsuario . '/' . $grupoPeriodo;

            // Subir archivo
            $documento = Storage::put($directorio, $archivo);

            // Verificar si ya existe un archivo para este grupoUser y actividad
            $archivoExistente = Archivo::where('grupo_user_id', $grupoUser->id)
                ->where('actividad_id', $actividad->id)
                ->first();

            if ($archivoExistente) {
                // Eliminar archivo anterior
                if (Storage::exists($archivoExistente->documento)) {
                    Storage::delete($archivoExistente->documento);
                }

                $archivoExistente->update([
                    'nombre' => $archivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $documento,
                ]);
            } else {
                Archivo::create([
                    'nombre' => $archivo->getClientOriginalName(),
                    'fecha' => now()->setTimezone(config('app.timezone')),
                    'documento' => $documento,
                    'grupo_user_id' => $grupoUser->id,
                    'actividad_id' => $actividad->id,
                ]);
            }

            DB::commit();

            return redirect()
                ->back()
                ->with('status', 'Operación exitosa');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors('Ocurrió un error al subir el archivo: ' . $e->getMessage());
        }
    }
}
