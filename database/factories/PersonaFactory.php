<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_persona' => fake()->firstName(),
            'apellido_persona' => fake()->lastName(),
            'cedula_persona'=> random_int(10000000, 99999999), // Random 8-digit number
            'telefono_persona' => random_int(600000000, 699999999), // Random 9-digit number starting with 6
            'genero_persona' => 'Masculino',
            'edad_persona' => rand(18, 60),
            'fecha_nacimiento_persona' => now()->subYears(rand(18, 60))->format('Y-m-d'),
            'email_persona' => Str::random(10) . '@example.com',
            'regis_patria' => random_int(0,1),
            'id_perfil' => 1, // Assuming a profile with ID 1 exists
            'id_sede' => 1, // Assuming a sede with ID 1 exists
        ];
    }
}
