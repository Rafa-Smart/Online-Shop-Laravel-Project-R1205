<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BuyerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->state(['role' => 'buyer']),
            'fullname' => fake()->name(),
            'phone_number' => fake()->unique()->phoneNumber(),
        ];
    }
}
