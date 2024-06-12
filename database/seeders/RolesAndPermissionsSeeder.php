<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Contrato;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

// Agregamos Spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permisos = [
            ['name' => 'roles.index', 'description' => 'Ver lista de roles'],
            ['name' => 'roles.create', 'description' => 'Agregar roles'],
            ['name' => 'roles.edit', 'description' => 'editar roles'],
            ['name' => 'roles.destroy', 'description' => 'borrar roles'],

            ['name' => 'usuarios.index', 'description' => 'Ver lista de usuarios'],
            ['name' => 'usuarios.create', 'description' => 'Agregar usuarios'],
            ['name' => 'usuarios.edit', 'description' => 'Editar usuarios'],
            ['name' => 'usuarios.destroy', 'description' => 'borrar usuarios'],
            ['name' => 'usuarios.roles', 'description' => 'Asignar roles'],

            ['name' => 'carreras.index', 'description' => 'Ver lista de carreras'],
            ['name' => 'carreras.create', 'description' => 'Agregar carreras'],
            ['name' => 'carreras.edit', 'description' => 'Editar carreras'],
            ['name' => 'carreras.destroy', 'description' => 'borrar carreras'],

            ['name' => 'materias.index', 'description' => 'Ver lista de materias'],
            ['name' => 'materias.create', 'description' => 'Agregar materias'],
            ['name' => 'materias.edit', 'description' => 'Editar materias'],
            ['name' => 'materias.destroy', 'description' => 'borrar materias'],

            ['name' => 'periodos.index', 'description' => 'Ver lista de periodos'],
            ['name' => 'periodos.create', 'description' => 'Agregar periodos'],
            ['name' => 'periodos.edit', 'description' => 'Editar periodos'],
            ['name' => 'periodos.destroy', 'description' => 'borrar periodos'],

            ['name' => 'grupos.index', 'description' => 'Ver lista de grupos'],
            ['name' => 'grupos.create', 'description' => 'Agregar grupos'],
            ['name' => 'grupos.edit', 'description' => 'Editar grupos'],
            ['name' => 'grupos.destroy', 'description' => 'borrar grupos'],

            ['name' => 'actividades.index', 'description' => 'Ver lista de actividades'],
            ['name' => 'actividades.create', 'description' => 'Agregar actividades'],
            ['name' => 'actividades.edit', 'description' => 'Editar actividades'],
            ['name' => 'actividades.destroy', 'description' => 'borrar actividades'],

            ['name' => 'archivos.index', 'description' => 'Ver lista de archivos'],
            ['name' => 'archivos.status', 'description' => 'Cambiar estado de archivos'],
            ['name' => 'archivos.download', 'description' => 'Descargar archivos'],

            ['name' => 'admin.index', 'description' => 'Panel administrativo'],
        ];
        
        foreach ($permisos as $permiso) {
            Permission::create($permiso);
        }
        

        // Rol de super administrador
        $role1 = Role::create(['name' => 'Super-Admin', 'description' => 'Acceso a todo']);

        // Agregando super administrador
        $user = User::create([
            'nombre' => 'Super Administrador',
            'email' => 'admin@correo.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        // insertar los datos para la tabla contratos
        DB::table('contratos')->insert([
            'nombre' => 'Planta',
        ]);

        DB::table('contratos')->insert([
            'nombre' => 'Honorario',
        ]);

        DB::table('contratos')->insert([
            'nombre' => 'Interino',
        ]);

        // Agregando un maestro
        $user1 = User::create([
            'nombre' => 'Hugo Bladimir',
            'apellido' => 'maestro',
            'rfc' => '2216',
            'email' => 'correo@correo.com',
            'password' => Hash::make('password'),
        ]);
    }
}
