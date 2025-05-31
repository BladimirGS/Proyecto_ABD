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
    // Muestra el formulario para editar el perfil del usuario
    public function edit()
    {
        return view('profile.edit', [
            'usuario' => Auth::user(),
            'contratos' => Contrato::all()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user = User::find($user->id);


        // Reglas de validación básicas
        $rules = [
            'apellido' => 'nullable|string|max:255',
            'genero' => 'nullable|string|in:Hombre,Mujer,Otro',
            'edad' => 'nullable|integer|min:1',
            'rfc' => 'nullable|string|max:13',
            'grado_estudio' => 'nullable|string|in:Primaria,Secundaria,Bachillerato,Licenciatura,Maestría,Doctorado,Otro',
            'telefono' => 'nullable|string|max:15',
            'placa' => 'nullable|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
        ];

        // Solo validar "nombre" si NO es Super Usuario
        if ($user->nombre !== 'Super Usuario') {
            $rules['nombre'] = 'required|string|max:255';
        }

        // Validar solicitud
        $validated = $request->validate($rules);

        // Preparar datos a actualizar
        $data = [
            'apellido' => $validated['apellido'] ?? null,
            'genero' => $validated['genero'] ?? null,
            'edad' => $validated['edad'] ?? null,
            'rfc' => $validated['rfc'] ?? null,
            'grado_estudio' => $validated['grado_estudio'] ?? null,
            'telefono' => $validated['telefono'] ?? null,
            'placa' => $validated['placa'] ?? null,
            'email' => $validated['email'],
        ];

        // Si se proporcionó una nueva contraseña, se encripta
        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        // Si NO es Super Usuario, se permite actualizar el nombre
        if ($user->nombre !== 'Super Usuario') {
            $data['nombre'] = $validated['nombre'];
        }

        // Actualizar el usuario
        $user->update($data);

        // Redirección condicional según permisos
        if (Gate::allows('admin.index')) {
            return redirect()->route('admin.index')->with('status', 'Operación exitosa');
        }

        if (Gate::allows('docentes.index')) {
            return redirect()->route('docentes.index')->with('status', 'Operación exitosa');
        }

        // Si no tiene permisos
        abort(403, 'No tiene permisos para acceder a esta sección.');
    }

    public function show(User $usuario)
    {
        return view('profile.show', ['usuario' => $usuario]);
    }
}
