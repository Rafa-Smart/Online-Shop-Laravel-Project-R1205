<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'google_id' => null,
            'role' => fake()->randomElement(['buyer', 'seller']),
            'is_verified' => true,
            'verification_token' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
