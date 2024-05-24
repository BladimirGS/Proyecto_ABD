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

        // Crear permisos
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }


        // Rol de super administrador
        $role1 = Role::create(['name' => 'Super-Admin']);

        // Agregando super administrador
        $user = User::create([
            'nombre' => 'Juan Carlos',
            'apellido' => 'admin',
            'rfc' => '2116',
            'email' => 'admin@correo.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        // insertar los datos para la tabla contratos
        DB::table('contratos')->insert([
            'nombre' => 'Planta',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('contratos')->insert([
            'nombre' => 'Honorario',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('contratos')->insert([
            'nombre' => 'Interino',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $permiso = Permission::create(['name'=>'ver-algo']);
        $permiso2 = Permission::create(['name'=>'crear-algo']);
        $role2 = Role::create(['name' => 'profe']);
        $role2->givePermissionTo($permiso);
        $role2->givePermissionTo($permiso2);

        // Agregando un maestro
        $user1 = User::create([
            'nombre' => 'Hugo Bladimir',
            'apellido' => 'maestro',
            'rfc' => '2216',
            'email' => 'correo@correo.com',
            'password' => Hash::make('password'),
        ]);
        $contrato = Contrato::find(1);
        $user1->contratos()->attach($contrato->id);
        $contrato1 = Contrato::find(3);
        $user1->contratos()->attach($contrato1->id);
        $user1->assignRole($role2);
    }
}
