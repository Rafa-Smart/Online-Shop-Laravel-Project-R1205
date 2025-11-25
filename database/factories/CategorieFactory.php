<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_name' => fake()->unique()->word(),
            'description' => fake()->sentence(10),
        ];
    }
}
