<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'usuario' => Auth::user(),
        ], [
            'breadcrumbs' => [
                'Inicio' => route('admin.index'),
                'Editar Perfil' => ''
            ]
        ]);
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'nullable|string|max:255',
            'genero' => 'nullable|string|in:Hombre,Mujer,Otro',
            'edad' => 'nullable|integer|min:1',
            'rfc' => 'nullable|string|max:13',
            'grado_estudio' => 'nullable|string|in:Primaria,Secundaria,Bachillerato,Licenciatura,Maestría,Doctorado,Otro',
            'telefono' => 'nullable|string|max:15',
            'placa_vehicular' => 'nullable|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ];

        $validated = $request->validate($rules);

        // Normalizar a mayúsculas (solo si no es null)
        foreach (['nombre', 'apellido', 'genero', 'rfc', 'grado_estudio', 'placa_vehicular'] as $campo) {
            if (!empty($validated[$campo])) {
                $validated[$campo] = mb_strtoupper($validated[$campo], 'UTF-8');
            }
        }

        // Si se proporciona una nueva contraseña, se encripta
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        // Redirección condicional
        if (Gate::allows('admin.index')) {
            return redirect()->route('admin.index')->with('status', 'Operación exitosa');
        }

        if (Gate::allows('docentes.index')) {
            return redirect()->route('docentes.index')->with('status', 'Operación exitosa');
        }

        abort(403, 'No tiene permisos para acceder a esta sección.');
    }
}
