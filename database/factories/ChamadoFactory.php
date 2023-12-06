<?php

namespace Database\Factories;

use App\Models\Chamado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chamado>
 */
class ChamadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_usuario' => $this->faker->numberBetween(1, \App\Models\User::count()),
            'titulo' => $this->faker->sentence,
            'descricao' => $this->faker->sentence,
            'prioridade' => $this->faker->randomElement([1,2,3,4]),
            'fechado_em' => $this->faker->dateTime,
            'departamento_id' => $this->faker->numberBetween(1, \App\Models\Departamento::count())
        ];
    }
}
