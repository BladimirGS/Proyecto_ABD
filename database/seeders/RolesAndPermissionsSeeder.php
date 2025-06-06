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
            ['name' => 'admin.index', 'description' => 'Ver panel administrativo'],
            ['name' => 'docentes.index', 'description' => 'Ver tablero de docente'],

            ['name' => 'roles.index', 'description' => 'Ver lista de roles'],
            ['name' => 'roles.create', 'description' => 'Agregar roles'],
            ['name' => 'roles.edit', 'description' => 'Editar roles'],
            ['name' => 'roles.destroy', 'description' => 'Borrar roles'],

            ['name' => 'roles.usuario.show', 'description' => 'Ver roles del usuario'],
            ['name' => 'roles.usuario.assign', 'description' => 'Asignar roles al usuario'],

            ['name' => 'usuarios.index', 'description' => 'Ver lista de usuarios'],
            ['name' => 'usuarios.create', 'description' => 'Agregar usuarios'],
            ['name' => 'usuarios.edit', 'description' => 'Editar usuarios'],
            ['name' => 'usuarios.destroy', 'description' => 'Borrar usuarios'],
            ['name' => 'usuarios.show', 'description' => 'Ver informacion de los usuarios'],

            ['name' => 'carreras.index', 'description' => 'Ver lista de carreras'],
            ['name' => 'carreras.create', 'description' => 'Agregar carreras'],
            ['name' => 'carreras.edit', 'description' => 'Editar carreras'],
            ['name' => 'carreras.destroy', 'description' => 'Borrar carreras'],

            ['name' => 'materias.index', 'description' => 'Ver lista de materias'],
            ['name' => 'materias.create', 'description' => 'Agregar materias'],
            ['name' => 'materias.edit', 'description' => 'Editar materias'],
            ['name' => 'materias.destroy', 'description' => 'Borrar materias'],

            ['name' => 'periodos.index', 'description' => 'Ver lista de periodos'],
            ['name' => 'periodos.create', 'description' => 'Agregar periodos'],
            ['name' => 'periodos.edit', 'description' => 'Editar periodos'],
            ['name' => 'periodos.destroy', 'description' => 'Borrar periodos'],

            ['name' => 'actividades.index', 'description' => 'Ver lista de actividades'],
            ['name' => 'actividades.create', 'description' => 'Agregar actividades'],
            ['name' => 'actividades.edit', 'description' => 'Editar actividades'],
            ['name' => 'actividades.destroy', 'description' => 'Borrar actividades'],

            ['name' => 'grupos.index', 'description' => 'Ver lista de grupos'],
            ['name' => 'grupos.create', 'description' => 'Agregar grupos'],
            ['name' => 'grupos.edit', 'description' => 'Editar grupos'],
            ['name' => 'grupos.destroy', 'description' => 'Borrar grupos'],
            ['name' => 'grupos.show', 'description' => 'Mostrar Grupo grupos'],

            ['name' => 'firma.index', 'description' => 'Ver lista de instrumentaciones'],
            ['name' => 'archivos.index', 'description' => 'Ver lista de archivos'],
            ['name' => 'archivos.descargar', 'description' => 'Descargar archivos'],
            ['name' => 'archivos.evaluar', 'description' => 'Evaluar archivos'],

            ['name' => 'reportes.index', 'description' => 'Ver listado de reportes'],
            ['name' => 'reportes.descargar', 'description' => 'Descargar reportes'],
        ];
        
        foreach ($permisos as $permiso) {
            Permission::create($permiso);
        }
        

        // Rol de super administrador
        $role1 = Role::create(['name' => 'Super Usuario', 'description' => 'Acceso a todo']);

        Role::create(['name' => 'Jefe', 'description' => 'Jefe del departamento']);

        Role::create(['name' => 'Docente', 'description' => 'Maestros']);

        Role::create(['name' => 'Administración', 'description' => 'Personal administrativo']);

        Role::create(['name' => 'Servicio', 'description' => 'Chicos del servicio']);

        // Agregando super administrador
        $user = User::create([
            'nombre' => 'Super Usuario',
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
