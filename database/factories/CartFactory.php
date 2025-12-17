<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Buyer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    public function definition(): array
    {
        return [
            'buyer_id' => Buyer::factory(),
            'product_id' => Product::factory(),
            'quantity' => fake()->numberBetween(1, 3),
        ];
    }
}
