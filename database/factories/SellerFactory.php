<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SellerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['role' => 'seller']),
            'store_name' => fake()->unique()->company(),
            'phone_number' => fake()->unique()->phoneNumber(),
        ];
    }
}
