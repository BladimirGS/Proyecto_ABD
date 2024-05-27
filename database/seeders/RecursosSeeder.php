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

        

        // Materias 
        $materias = [
            ['clave' => 'ACF0901', 'nombre' => 'Calculo Diferencial'],
            ['clave' => 'SCD1008', 'nombre' => 'Fundamentos De Programacion'],
            ['clave' => 'ACA0907', 'nombre' => 'Taller De Etica'],
            ['clave' => 'AEF1041', 'nombre' => 'Matematicas Discretas'],
            ['clave' => 'SCH1024', 'nombre' => 'Taller De Administracion'],
            ['clave' => 'ACC0906', 'nombre' => 'Fundamentos De Investigacion'],
            ['clave' => 'ACF0902', 'nombre' => 'Calculo Integral'],
            ['clave' => 'SCD1020', 'nombre' => 'Programacion Orientada A Objetos'],
            ['clave' => 'AEC1008', 'nombre' => 'Contabilidad Financiera'],
            ['clave' => 'AEC1058', 'nombre' => 'Quimica'],
            ['clave' => 'ACF0903', 'nombre' => 'Algebra Lineal'],
            ['clave' => 'SCF-1023', 'nombre' => 'Probabilidad Y Estadistica'],
            ['clave' => 'ACF0904', 'nombre' => 'Calculo Vectorial'],
            ['clave' => 'SCD1007', 'nombre' => 'Estructura De Datos'],
            ['clave' => 'SCC1005', 'nombre' => 'Cultura Empresarial'],
            ['clave' => 'SCC1013', 'nombre' => 'Investigacion De Operaciones'],
            ['clave' => 'AEC1061', 'nombre' => 'Sistemas Operativos'],
            ['clave' => 'SCF1006', 'nombre' => 'Fisica General'],
            ['clave' => 'ACF0905', 'nombre' => 'Ecuaciones Diferenciales'],
            ['clave' => 'SCC1017', 'nombre' => 'Metodos Numericos'],
            ['clave' => 'SCD1027', 'nombre' => 'Topicos Avanzados De Programacion'],
            ['clave' => 'AEF1031', 'nombre' => 'Fundamentos De Bases De Datos'],
            ['clave' => 'SCA1026', 'nombre' => 'Taller De Sistemas Operativos'],
            ['clave' => 'SCD1018', 'nombre' => 'Principios Electricos Y Aplicaciones Digitales'],
        ];

        DB::table('materias')->insert($materias);

        // Carreras 
        $carreras = [
            ['nombre' => 'Ingeniería en Sistemas Computacionales'],
            ['nombre' => 'Ingeniería en Tecnologías de la Información'],
            ['nombre' => 'Ingeniería Industrial'],
            ['nombre' => 'Ingeniería Mecánica'],
            ['nombre' => 'Ingeniería Electrónica'],
            ['nombre' => 'Ingeniería Civil'],
            ['nombre' => 'Ingeniería Química'],
            ['nombre' => 'Arquitectura'],
            ['nombre' => 'Licenciatura en Administración'],
            ['nombre' => 'Licenciatura en Contaduría'],
            ['nombre' => 'Ingeniería en Gestión Empresarial'],
        ];

        DB::table('carreras')->insert($carreras);

        // Periodos
        $periodos = [
            ['nombre' => '2022\'A', 'fecha_inicio' => '2022-01-01', 'fecha_fin' => '2022-06-30'],
            ['nombre' => '2022\'B', 'fecha_inicio' => '2022-07-01', 'fecha_fin' => '2022-12-31'],
            ['nombre' => '2023\'A', 'fecha_inicio' => '2023-01-01', 'fecha_fin' => '2023-06-30'],
            ['nombre' => '2023\'B', 'fecha_inicio' => '2023-07-01', 'fecha_fin' => '2023-12-31'],
            ['nombre' => '2024\'A', 'fecha_inicio' => '2024-01-01', 'fecha_fin' => '2024-06-30'],
            ['nombre' => '2024\'B', 'fecha_inicio' => '2024-07-01', 'fecha_fin' => '2024-12-31'],
        ];

        DB::table('periodos')->insert($periodos);

        // Actividades
        $activities = [
            ['nombre' => 'Temario', 'fecha' => '2023-01-10', 'periodo_id' => 5],
            ['nombre' => 'Reporte Inicio de Semestre', 'fecha' => '2023-01-15', 'periodo_id' => 5],
            ['nombre' => 'Reporte Intermedio', 'fecha' => '2023-03-15', 'periodo_id' => 5],
            ['nombre' => 'Reporte Final', 'fecha' => '2023-06-15', 'periodo_id' => 5],
            ['nombre' => 'Acta de Calificación', 'fecha' => '2023-06-20', 'periodo_id' => 5],
            
            ['nombre' => 'Temario', 'fecha' => '2024-01-10', 'periodo_id' => 6],
            ['nombre' => 'Reporte Inicio de Semestre', 'fecha' => '2024-01-15', 'periodo_id' => 6],
            ['nombre' => 'Reporte Intermedio', 'fecha' => '2024-03-15', 'periodo_id' => 6],
            ['nombre' => 'Reporte Final', 'fecha' => '2024-06-15', 'periodo_id' => 6],
            ['nombre' => 'Acta de Calificación', 'fecha' => '2024-06-20', 'periodo_id' => 6],
            // Añade más actividades según sea necesario
        ];

        DB::table('activities')->insert($activities);

        
        $grupos = [
            [
                'clave' => '4SA',
                'semestre' => '4',
                'user_id' => 1, // Ajusta según tus datos en la tabla users
                'carrera_id' => 1, // Ajusta según tus datos en la tabla carreras
                'materia_id' => 1, // Ajusta según tus datos en la tabla materias
                'periodo_id' => 1, // Ajusta según tus datos en la tabla periodos
                'color' => '#6b7280'
            ],
            [
                'clave' => '2IS',
                'semestre' => '2',
                'user_id' => 1,
                'carrera_id' => 2,
                'materia_id' => 2,
                'periodo_id' => 2,
                'color' => '#ef4444'
            ],
            [
                'clave' => '3SF',
                'semestre' => '3',
                'user_id' => 1,
                'carrera_id' => 3,
                'materia_id' => 3,
                'periodo_id' => 3,
                'color' => '#f97316'
            ],
            [
                'clave' => '2SE',
                'semestre' => '2',
                'user_id' => 2,
                'carrera_id' => 4,
                'materia_id' => 4,
                'periodo_id' => 4,
                'color' => '#10b981'
            ],
        ];

        DB::table('grupos')->insert($grupos);
        
    }
}
