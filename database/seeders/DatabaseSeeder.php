<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AsignacionMateria;
use App\Models\Asistencia;
use App\Models\AsistenciaEstudiante;
use App\Models\Carrera;
use App\Models\Configuracion;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Grupos_academico;
use App\Models\Horario;
use App\Models\Materia;
use App\Models\Matriculacion;
use App\Models\Nivel;
use App\Models\Paralelo;
use App\Models\Periodo;
use App\Models\Turno;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([RoleSeeder::class]);
        $this->call([EstudianteSeeder::class]);
        $this->call([DocenteSeeder::class]);

        Configuracion::create([

            'nombre'=>'Universidad Erick',
            'descripcion' => 'Universidad para Todos',
            'direccion'=>'Av Cumavi/Barrio San juan Calle 5/Nro223',
            'telefono'=>'76658536',
            'email'=>'universidad@gmail.com',
            'web'=>'https://erick.com',
            'logo'=>'img/logo.jpg'     
        ]);

        User::create([
            'name'=>'Erick Morales',
            'email'=>'erick@gmail.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('ADMINISTRADOR');

        Gestion::create(['nombre'=>'I-2025']);
        Gestion::create(['nombre'=>'II-2025']);

        Carrera::create(['nombre'=>'INFORMATICA']);
        Carrera::create(['nombre'=>'CONTADURIA PUBLICA']);
        Carrera::create(['nombre'=>'DERECHO']);
        Carrera::create(['nombre'=>'CIENCIA DE LA EDUCACION']);

        Nivel::create(['nombre'=>'LICENCIATURA']);
        Nivel::create(['nombre'=>'POSGRADO']);
        Nivel::create(['nombre'=>'TECNICO SUPERIOR']);

        Turno::create(['nombre'=>'MAÑANA']);
        Turno::create(['nombre'=>'TARDE']);
        Turno::create(['nombre'=>'NOCHE']);

        Paralelo::create(['nombre'=>'A']);
        Paralelo::create(['nombre'=>'B']);
        Paralelo::create(['nombre'=>'C']);
        Paralelo::create(['nombre'=>'D']);
        Paralelo::create(['nombre'=>'E']);
        Paralelo::create(['nombre'=>'F']);

        Periodo::create(['nombre'=>'PRIMER SEMESTRE']);
        Periodo::create(['nombre'=>'SEGUNDO SEMESTRE']);
        Periodo::create(['nombre'=>'TERCERO SEMESTRE']);
        Periodo::create(['nombre'=>'CUARTO SEMESTRE']);
        Periodo::create(['nombre'=>'QUINTO SEMESTRE']);
        Periodo::create(['nombre'=>'SEXTO SEMESTRE']);
        Periodo::create(['nombre'=>'SEPTIMO SEMESTRE']);
        Periodo::create(['nombre'=>'OCTAVO SEMESTRE']);
        Periodo::create(['nombre'=>'NOVENO SEMESTRE']);
        Periodo::create(['nombre'=>'DECIMO SEMESTRE']);

        Materia::create([
            'carrera_id'=>'1',
            'nombre'=>'PROGRAMACION I',
            'codigo'=>'INF-PRO-1'
        ]);
        Materia::create([
            'carrera_id'=>'1',
            'nombre'=>'BASE DE DATOS I',
            'codigo'=>'INF-BD-1'
        ]);
        Materia::create([
            'carrera_id'=>'1',
            'nombre'=>'FUNDAMENTOS DE PROGRAMACION',
            'codigo'=>'INF-FP-1'
        ]);

        Grupos_academico::create(['docente_id'=>'1','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','materia_id'=>'1',
        'turno_id'=>'1','paralelo_id'=>'1','estado'=>'activo','fecha_asignacion'=>'2025-02-01','cupo_maximo'=>'20']);
        Grupos_academico::create(['docente_id'=>'2','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','materia_id'=>'2',
        'turno_id'=>'1','paralelo_id'=>'1','estado'=>'activo','fecha_asignacion'=>'2025-02-01','cupo_maximo'=>'25']);
        Grupos_academico::create(['docente_id'=>'3','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','materia_id'=>'3',
        'turno_id'=>'1','paralelo_id'=>'1','estado'=>'activo','fecha_asignacion'=>'2025-02-01','cupo_maximo'=>'30']);
        
        Horario::create(['grupo_academico_id' => '1','dia' => 'Lunes','hora_inicio' => '07:30','hora_fin' => '09:00','aula' => 'A2','estado' => 'activo']);        
        Horario::create(['grupo_academico_id' => '1','dia' => 'Martes','hora_inicio' => '09:00','hora_fin' => '10:30','aula' => 'A2','estado' => 'activo']);
        Horario::create(['grupo_academico_id' => '2','dia' => 'Miercoles','hora_inicio' => '10:00','hora_fin' => '11:30','aula' => 'A2','estado' => 'activo']);            
        Horario::create(['grupo_academico_id' => '2','dia' => 'Jueves','hora_inicio' => '07:30','hora_fin' => '09:00','aula' => 'A2','estado' => 'activo']);
            
        Matriculacion::create(['estudiante_id'=>'1','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','fecha_matriculacion'=>'2025-04-01']);
        Matriculacion::create(['estudiante_id'=>'2','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','fecha_matriculacion'=>'2025-04-01']);
        Matriculacion::create(['estudiante_id'=>'3','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','fecha_matriculacion'=>'2025-04-01']);
        Matriculacion::create(['estudiante_id'=>'4','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','fecha_matriculacion'=>'2025-04-01']);
        Matriculacion::create(['estudiante_id'=>'5','gestion_id'=>'1','nivel_id'=>'1','periodo_id'=>'1','carrera_id'=>'1','fecha_matriculacion'=>'2025-04-01']);

        AsignacionMateria::create(['grupo_academico_id'=>'1','matriculacion_id'=>'1','estado'=>'activo','fecha_asignacion'=>'2025-04-11']);
        AsignacionMateria::create(['grupo_academico_id'=>'1','matriculacion_id'=>'2','estado'=>'activo','fecha_asignacion'=>'2025-04-11']);
        AsignacionMateria::create(['grupo_academico_id'=>'1','matriculacion_id'=>'3','estado'=>'activo','fecha_asignacion'=>'2025-04-11']);
        AsignacionMateria::create(['grupo_academico_id'=>'1','matriculacion_id'=>'4','estado'=>'activo','fecha_asignacion'=>'2025-04-11']);
        AsignacionMateria::create(['grupo_academico_id'=>'1','matriculacion_id'=>'5','estado'=>'activo','fecha_asignacion'=>'2025-04-11']);
        

        Asistencia::create(['grupo_academico_id'=>'1','fecha'=>'2025-04-11']);
        Asistencia::create(['grupo_academico_id'=>'1','fecha'=>'2025-04-12']);
        

        AsistenciaEstudiante::create(['asistencia_id'=>'1','estudiante_id'=>'1','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'1','estudiante_id'=>'2','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'1','estudiante_id'=>'3','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'1','estudiante_id'=>'4','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'1','estudiante_id'=>'5','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'2','estudiante_id'=>'1','estado'=>'falta',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'2','estudiante_id'=>'2','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'2','estudiante_id'=>'3','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'2','estudiante_id'=>'4','estado'=>'presente',]);
        AsistenciaEstudiante::create(['asistencia_id'=>'2','estudiante_id'=>'5','estado'=>'presente',]);
    }
}
