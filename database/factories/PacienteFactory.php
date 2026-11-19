<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->unique()->numerify('########'),
            'nombres' => fake()->firstName(),
            'apellidos' => fake()->lastName() . ' ' . fake()->lastName(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-80 years', '-1 year')->format('Y-m-d'),
            'sexo' => fake()->randomElement(['M', 'F']),
            'telefono' => fake()->numerify('9########'),
            'direccion' => fake()->streetAddress(),
        ];
    }
}