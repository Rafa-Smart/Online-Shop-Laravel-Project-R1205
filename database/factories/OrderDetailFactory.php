<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

class OrderDetailFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->numberBetween(100000, 600000);
        $quantity = $this->faker->numberBetween(1, 5);

        return [
            'order_id'   => Order::inRandomOrder()->first()->id ?? Order::factory(),
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'quantity'   => $quantity,
            'price'      => $price,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
