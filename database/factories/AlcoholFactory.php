<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alcohol>
 */
class AlcoholFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //1行追加
            'name' => $this->faker->name,
            'degree' => $this->faker->numberBetween(1, 96),
            'amount' => $this->faker->numberBetween(100, 1000),
            'phrase' => $this->faker->realText(40),

        ];
    }
}
