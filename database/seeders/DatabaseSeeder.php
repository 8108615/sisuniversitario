<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Carrera;
use App\Models\Estudiante;
use App\Models\Gestion;
use App\Models\Materia;
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

        Role::create(['name'=>'ADMINISTRADOR']);
        Role::create(['name'=>'ADMINISTRATIVO']);
        Role::create(['name'=>'DOCENTE']);
        Role::create(['name'=>'ESTUDIANTE']);

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

        /*$usuario = User::create([
            'name'=>'Estudiante Ejemplo',
            'email'=>'estudiante@gmail.com',
            'password'=>Hash::make('9876543'),
        ])->assignRole('ESTUDIANTE');

        Estudiante::create([
            'usuario_id' => $usuario->id,
            'nombres' => 'Carlos',
            'apellidos' => 'Gomez',
            'ci' => '9876543',
            'fecha_nacimiento' => '2005-03-15',
            'telefono' => '70098765',
            'ref_celular' => '60012345',
            'parentesco' => 'Padre',
            'profesion' => 'Estudiante',
            'direccion' => 'calle 456, santa cruz',
            'foto' => 'foto.jpg',
            'estado' => 'activo',
        ]);
        */

        $this->call([EstudianteSeeder::class]);
        $this->call([DocenteSeeder::class]);

    }
}
