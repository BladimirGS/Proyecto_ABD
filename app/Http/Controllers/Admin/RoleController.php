<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create');
        $this->middleware('can:roles.edit')->only('edit');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => [
                'required',
                Rule::unique('roles', 'name')->ignore($request->id),
            ],
            'descripcion' => 'required',
            'permisos' => ['required', 'array', Rule::exists('permissions', 'id')],
        ]);

        $role = Role::create([
            'name' => mb_strtoupper($request->nombre, 'UTF-8'),
            'description' => $request->descripcion
        ]);

        $role->permissions()->sync($request->permisos);

        return redirect()->route('roles.index')->with('status', 'Operación exitosa');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'nombre' => [
                'required',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
            'descripcion' => 'required',
            'permisos' => ['required', 'array', Rule::exists('permissions', 'id')],
        ]);

        $role->update([
            'name' => mb_strtoupper($request->nombre, 'UTF-8'),
            'description' => $request->descripcion
        ]);

        $role->permissions()->sync($request->permisos);

        return redirect()->route('roles.index')->with('status', 'Operación exitosa');
    }
}
