<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;
use App\Models\Categorie;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'seller_id' => 1,
            'category_id' => Categorie::inRandomOrder()->first()->id ?? Categorie::factory(),
            'product_name' => $this->faker->words(3, true),
            'price' => $this->faker->numberBetween(10000, 1000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'img' => $this->faker->imageUrl(640, 480, 'product', true), // gambar random dari faker
            'product_specifications' => json_encode([
                'weight' => $this->faker->numberBetween(100, 2000).'g',
                'color' => $this->faker->safeColorName(),
                'size' => $this->faker->randomElement(['S','M','L','XL']),
            ]),
        ];
    }
}
