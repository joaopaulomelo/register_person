<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => '11111111111',
            'email' => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date(),
            'nationality' => 'brazil'
        ];
    }
}
