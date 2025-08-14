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
            $usuario = $grupoUser->user;
            $grupo   = $grupoUser->grupo;
            $periodo = $grupoUser->periodo;

            $archivoSubido = $request->file('archivo');

            // Ruta del directorio destino
            $carpetaUsuario = str_replace([' ', '/', '\\'], '_', "{$usuario->nombre}_{$usuario->apellido}");
            $grupoPeriodo   = str_replace([' ', '/', '\\'], '_', "{$grupo->clave}_{$periodo->nombre}");
            $directorio     = "archivos/{$carpetaUsuario}/{$grupoPeriodo}";

            // Guardar archivo
            $rutaDocumento = Storage::put($directorio, $archivoSubido);

            // Buscar si ya existe un archivo de esa actividad para el grupoUser
            $archivoExistente = Archivo::where('grupo_user_id', $grupoUser->id)
                ->where('actividad_id', $actividad->id)
                ->where('user_id', $usuario->id)
                ->first();

            if ($archivoExistente) {
                // Eliminar archivo anterior si existe
                if (Storage::exists($archivoExistente->documento)) {
                    Storage::delete($archivoExistente->documento);
                }

                // Mantener o cambiar estado
                $nuevoEstado = strtolower($archivoExistente->estado) === 'rechazado' | 'aprobado'
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
}
