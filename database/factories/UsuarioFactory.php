<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            
            'endereco' => $this->faker->address(),
            'name' => $this->faker->name(),
            'contato' => $this->faker->phoneNumber(),
            'obs' => $this->faker->text(50),
            'cpf' => $this->faker->cpf,
            'rg' => $this->faker->cpf,
            'titulo' =>  $this->faker->cpf,
            'user_id' =>  1,
        ];
    }
}
