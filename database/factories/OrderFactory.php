<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
           'buyer_id' => Buyer::inRandomOrder()->first()->id ?? Buyer::factory(),

            'seller_id'  => Seller::inRandomOrder()->first()->id ?? Seller::factory(),
            'status'     => 'completed',
            'total_price'=> $this->faker->numberBetween(150000, 800000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     *  🔹 State untuk Daily Data (10 hari terakhir)
     */
    public function daily()
    {
        return $this->state(function () {
            $daysAgo = $this->faker->numberBetween(0, 9); // 0–9 hari lalu
            $date = now()->subDays($daysAgo);

            return [
                'created_at' => $date,
                'updated_at' => $date,
            ];
        });
    }

    /**
     * 🔹 State untuk Monthly Data (12 bulan terakhir)
     */
    public function monthly()
    {
        return $this->state(function () {
            $monthsAgo = $this->faker->numberBetween(0, 11); // 0–11 bulan lalu
            $day = $this->faker->numberBetween(1, 28); // aman semua bulan

            $date = now()->subMonths($monthsAgo)->setDay($day);

            return [
                'created_at' => $date,
                'updated_at' => $date,
            ];
        });
    }

    /**
     * 🔹 State untuk Yearly Data (3 tahun terakhir)
     */
    public function yearly()
    {
        return $this->state(function () {
            $yearsAgo = $this->faker->numberBetween(0, 2); // 0–2 tahun lalu
            $month = $this->faker->numberBetween(1, 12);
            $day   = $this->faker->numberBetween(1, 28);

            $date = now()
                ->subYears($yearsAgo)
                ->setMonth($month)
                ->setDay($day);

            return [
                'created_at' => $date,
                'updated_at' => $date,
            ];
        });
    }
}
