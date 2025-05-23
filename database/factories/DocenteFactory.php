<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $nombres = $this->faker->firstName;
        $apellidos = $this->faker->lastName;
        $ci = $this->faker->unique()->numerify('########');

        $usuario = User::create([
            'name' => $nombres." ".$apellidos,
            'email' =>$this->faker->unique()->safeEmail,
            'password' => bcrypt($ci),

        ]);

        $usuario->assignRole('DOCENTE');
        
        return [
            'usuario_id' => $usuario->id,
            'nombres' =>$nombres,
            'apellidos' =>$apellidos,
            'ci' =>$ci,
            'fecha_nacimiento' =>$this->faker->date('Y-m-d','2000-12-31'),
            'telefono' =>$this->faker->numerify('7#######'),
            'profesion' =>$this->faker->jobTitle,
            'direccion' =>$this->faker->address,
            'foto' => 'docente.jpg',
        ];
    }
}
