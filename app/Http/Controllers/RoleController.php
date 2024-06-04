<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 
            'permisos' => ['required', 'array', Rule::exists('permissions', 'id')],
        ]);
        
        $role = Role::create([
            'name' => $request->nombre
        ]);

        $role->permissions()->sync($request->permisos);


        return redirect()->route('roles.index')->with('status', 'Operacion exitosa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nombre' => 'required', 
            'permisos' => ['required', 'array', Rule::exists('permissions', 'id')],
        ]);

        $role->update([
            'name' => $request->nombre
        ]);

        $role->permissions()->sync($request->permisos);
        
        return redirect()->route('roles.index')->with('status', 'Operacion exitosa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return back()->with('status', 'Operación exitosa');
    }
}
