<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear existing categories

        // Insert 10 e-commerce categories
        $categories = [
            [
                'category_name' => 'Smartphone & Tablet',
                'description' => 'Smartphone, tablet, iPad, aksesoris mobile, power bank, dan perangkat komunikasi terkini',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Laptop & Komputer',
                'description' => 'Laptop, PC desktop, monitor, keyboard, mouse, printer, dan aksesoris komputer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Fashion Pria',
                'description' => 'Pakaian pria, sepatu pria, aksesoris fashion pria, jam tangan, dan tas pria',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Fashion Wanita',
                'description' => 'Pakaian wanita, sepatu wanita, tas wanita, aksesoris fashion wanita, dan perhiasan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Elektronik Rumah',
                'description' => 'Televisi, kulkas, AC, mesin cuci, blender, microwave, dan peralatan rumah tangga elektronik',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Olahraga & Outdoor',
                'description' => 'Sepatu olahraga, pakaian olahraga, alat fitness, camping, hiking, dan perlengkapan outdoor',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Kesehatan & Kecantikan',
                'description' => 'Skincare, makeup, alat kecantikan, obat-obatan, vitamin, dan suplemen kesehatan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Perabotan Rumah',
                'description' => 'Sofa, meja, kursi, lemari, tempat tidur, dan dekorasi rumah',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Otomotif',
                'description' => 'Aksesoris mobil, aksesoris motor, perlengkapan perawatan kendaraan, dan alat otomotif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Mainan & Hobi',
                'description' => 'Mainan anak, action figure, board game, alat musik, perlengkapan hobi, dan koleksi',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('categories')->upsert(
    [
        [
            'category_name' => 'Smartphone & Tablet',
            'description' => 'Smartphone, tablet, iPad, aksesoris mobile, power bank, dan perangkat komunikasi terkini',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Laptop & Komputer',
            'description' => 'Laptop, PC desktop, monitor, keyboard, mouse, printer, dan aksesoris komputer',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Fashion Pria',
            'description' => 'Pakaian pria, sepatu pria, aksesoris fashion pria, jam tangan, dan tas pria',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Fashion Wanita',
            'description' => 'Pakaian wanita, sepatu wanita, tas wanita, aksesoris fashion wanita, dan perhiasan',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Elektronik Rumah',
            'description' => 'Televisi, kulkas, AC, mesin cuci, blender, microwave, dan peralatan rumah tangga elektronik',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Olahraga & Outdoor',
            'description' => 'Sepatu olahraga, pakaian olahraga, alat fitness, camping, hiking, dan perlengkapan outdoor',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Kesehatan & Kecantikan',
            'description' => 'Skincare, makeup, alat kecantikan, obat-obatan, vitamin, dan suplemen kesehatan',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Perabotan Rumah',
            'description' => 'Sofa, meja, kursi, lemari, tempat tidur, dan dekorasi rumah',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Otomotif',
            'description' => 'Aksesoris mobil, aksesoris motor, perlengkapan perawatan kendaraan, dan alat otomotif',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'category_name' => 'Mainan & Hobi',
            'description' => 'Mainan anak, action figure, board game, alat musik, perlengkapan hobi, dan koleksi',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ],
    ['category_name'],        // unique key
    ['description', 'updated_at'] // columns to update
);


        $this->command->info('✅ 10 kategori e-commerce berhasil dibuat!');
        $this->command->info('');
        $this->command->info('📊 Daftar kategori:');
        
        $createdCategories = DB::table('categories')->get();
        foreach ($createdCategories as $category) {
            $this->command->info("   {$category->id}. {$category->category_name} - {$category->description}");
        }
    }
}