<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

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
        
    }
}
