<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'photo_path' => fake()->imageUrl(),
        ];
    }
}
