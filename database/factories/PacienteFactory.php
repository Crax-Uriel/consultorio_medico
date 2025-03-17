<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
            'nombre_paciente' => $this->faker->firstName,
            'apellido_paterno_paciente' => $this->faker->lastName,
            'apellido_materno_paciente' => $this->faker->lastName,
            'curp_paciente' => strtoupper(Str::random(18)), // Simula un CURP
            'nss' => $this->faker->unique()->numerify('###########'), // Simula un NSS
            'correo_paciente' => $this->faker->unique()->safeEmail,
            'celular_paciente' => $this->faker->numerify('##########'),
            'fecha_nacimiento_paciente' => $this->faker->date,
            'direccion_paciente' => $this->faker->address,
            'sexo_paciente' => $this->faker->randomElement(['M', 'F']),
            'tipo_sangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-']),
            'alergias' => $this->faker->sentence(3),
            'peso' => $this->faker->randomFloat(2, 40, 120),
            'altura' => $this->faker->randomFloat(2, 1.40, 2.00),
            'contacto_emergencia' => $this->faker->numerify('##########'),
            'observaciones' => $this->faker->optional()->sentence(5),

        ];
    }
}
