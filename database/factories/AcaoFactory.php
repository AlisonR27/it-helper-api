<?php

namespace Database\Factories;

use App\Models\Acao;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acao>
 */
class AcaoFactory extends Factory
{
    protected $model = Acao::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id_funcionario_1' => $this->faker->numberBetween(1, \App\Models\Funcionario::count()),
            'id_funcionario_2' => $this->faker->numberBetween(1, \App\Models\Funcionario::count()),
            'descricao' => $this->faker->sentence
        ];
    }
}
