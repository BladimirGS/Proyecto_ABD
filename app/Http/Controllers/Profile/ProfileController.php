<?php

namespace App\Http\Controllers\Profile;

use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    // Actualiza la información del perfil del usuario
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validación de los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'genero' => 'required|string|in:Hombre,Mujer,Otro',
            'edad' => 'required|integer|min:1',
            'rfc' => 'required|string|max:13',
            'grado_estudio' => 'required|string|in:Primaria,Secundaria,Bachillerato,Licenciatura,Maestría,Doctorado,Otro',
            'telefono' => 'required|string|max:15',
            'placa' => 'nullable|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string',
        ]);

        // Actualiza los datos del usuario
        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'genero' => $request->genero,
            'edad' => $request->edad,
            'rfc' => $request->rfc,
            'grado_estudio' => $request->grado_estudio,
            'telefono' => $request->telefono,
            'placa' => $request->placa,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('docentes.index')->with('success', 'Perfil actualizado con éxito');
    }
}
