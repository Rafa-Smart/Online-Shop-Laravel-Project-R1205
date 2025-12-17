<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'buyer_id' => Buyer::factory(),
            'content' => fake()->sentence(15),
            'rating' => fake()->numberBetween(1, 5),
        ];
    }
}
