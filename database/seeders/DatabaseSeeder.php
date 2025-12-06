<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        echo "🚀 Starting database seeding...\n\n";

        // 1. Buat 5 Categories Manual
        echo "📁 Creating 5 categories...\n";
        $categories = [
            ['category_name' => 'Elektronik', 'description' => 'Produk elektronik dan gadget'],
            ['category_name' => 'Fashion', 'description' => 'Pakaian dan aksesoris'],
            ['category_name' => 'Makanan', 'description' => 'Makanan dan minuman'],
            ['category_name' => 'Olahraga', 'description' => 'Perlengkapan olahraga'],
            ['category_name' => 'Buku', 'description' => 'Buku dan alat tulis'],
        ];

        foreach ($categories as $cat) {
            Categorie::create($cat);
        }

        // 2. Buat 10 Products Manual
        echo "📦 Creating 10 products...\n";
        $products = [
            ['seller_id' => 1, 'category_id' => 1, 'product_name' => 'Smartphone Samsung Galaxy', 'price' => 3500000, 'stock' => 50, 'condition' => 'new', 'description' => 'Smartphone flagship terbaru', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.5, 'rating_count' => 120],
            ['seller_id' => 1, 'category_id' => 1, 'product_name' => 'Laptop ASUS ROG', 'price' => 15000000, 'stock' => 20, 'condition' => 'new', 'description' => 'Laptop gaming performa tinggi', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.8, 'rating_count' => 85],
            ['seller_id' => 1, 'category_id' => 2, 'product_name' => 'Jaket Denim Premium', 'price' => 350000, 'stock' => 100, 'condition' => 'new', 'description' => 'Jaket denim stylish', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.3, 'rating_count' => 200],
            ['seller_id' => 1, 'category_id' => 2, 'product_name' => 'Sepatu Sneakers Nike', 'price' => 1200000, 'stock' => 75, 'condition' => 'new', 'description' => 'Sepatu sneakers kualitas original', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.7, 'rating_count' => 150],
            ['seller_id' => 1, 'category_id' => 3, 'product_name' => 'Kopi Arabica Premium 500g', 'price' => 150000, 'stock' => 200, 'condition' => 'new', 'description' => 'Kopi arabica pilihan', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.6, 'rating_count' => 300],
            ['seller_id' => 1, 'category_id' => 3, 'product_name' => 'Cokelat Belgium Import', 'price' => 85000, 'stock' => 150, 'condition' => 'new', 'description' => 'Cokelat premium import', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.4, 'rating_count' => 180],
            ['seller_id' => 1, 'category_id' => 4, 'product_name' => 'Raket Badminton Yonex', 'price' => 850000, 'stock' => 40, 'condition' => 'new', 'description' => 'Raket badminton profesional', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.9, 'rating_count' => 90],
            ['seller_id' => 1, 'category_id' => 4, 'product_name' => 'Matras Yoga Premium', 'price' => 250000, 'stock' => 80, 'condition' => 'new', 'description' => 'Matras yoga anti slip', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.2, 'rating_count' => 110],
            ['seller_id' => 1, 'category_id' => 5, 'product_name' => 'Novel Best Seller', 'price' => 95000, 'stock' => 120, 'condition' => 'new', 'description' => 'Novel terlaris tahun ini', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.7, 'rating_count' => 250],
            ['seller_id' => 1, 'category_id' => 5, 'product_name' => 'Set Alat Tulis Lengkap', 'price' => 175000, 'stock' => 90, 'condition' => 'new', 'description' => 'Set alat tulis premium', 'img' => 'https://via.placeholder.com/640x480', 'average_rating' => 4.5, 'rating_count' => 160],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }

        // 3. Buat 50 Orders Manual dengan Variasi Waktu yang Jelas
        echo "🛒 Creating 50 orders with varied patterns...\n";
        
        $orders = [
            // JANUARI 2023 - Mulai rendah (2 orders)
            ['date' => '2023-01-15', 'products' => [1 => 1, 3 => 2], 'status' => 'completed'],
            ['date' => '2023-01-28', 'products' => [5 => 3], 'status' => 'completed'],
            
            // FEBRUARI 2023 - Naik sedikit (2 orders)
            ['date' => '2023-02-10', 'products' => [2 => 1], 'status' => 'completed'],
            ['date' => '2023-02-20', 'products' => [4 => 1, 6 => 2], 'status' => 'completed'],
            
            // MARET 2023 - Naik (3 orders)
            ['date' => '2023-03-05', 'products' => [7 => 1], 'status' => 'completed'],
            ['date' => '2023-03-15', 'products' => [9 => 2, 10 => 1], 'status' => 'completed'],
            ['date' => '2023-03-25', 'products' => [1 => 1, 5 => 1], 'status' => 'completed'],
            
            // APRIL 2023 - Puncak pertama (4 orders)
            ['date' => '2023-04-08', 'products' => [3 => 2, 6 => 1], 'status' => 'completed'],
            ['date' => '2023-04-12', 'products' => [8 => 1], 'status' => 'completed'],
            ['date' => '2023-04-18', 'products' => [2 => 1], 'status' => 'completed'],
            ['date' => '2023-04-25', 'products' => [4 => 2, 5 => 2], 'status' => 'completed'],
            
            // MEI 2023 - Turun (2 orders)
            ['date' => '2023-05-10', 'products' => [7 => 1, 9 => 1], 'status' => 'completed'],
            ['date' => '2023-05-22', 'products' => [1 => 1], 'status' => 'cancelled'],
            
            // JUNI 2023 - Naik lagi (3 orders)
            ['date' => '2023-06-05', 'products' => [3 => 1, 6 => 2], 'status' => 'completed'],
            ['date' => '2023-06-15', 'products' => [10 => 2], 'status' => 'completed'],
            ['date' => '2023-06-28', 'products' => [5 => 3, 6 => 1], 'status' => 'completed'],
            
            // JULI 2023 - Stabil (3 orders)
            ['date' => '2023-07-10', 'products' => [2 => 1], 'status' => 'completed'],
            ['date' => '2023-07-18', 'products' => [8 => 1, 9 => 1], 'status' => 'shipped'],
            ['date' => '2023-07-25', 'products' => [4 => 1], 'status' => 'completed'],
            
            // AGUSTUS 2023 - Puncak (5 orders)
            ['date' => '2023-08-05', 'products' => [1 => 2, 3 => 1], 'status' => 'completed'],
            ['date' => '2023-08-10', 'products' => [7 => 1], 'status' => 'completed'],
            ['date' => '2023-08-15', 'products' => [5 => 2, 6 => 3], 'status' => 'completed'],
            ['date' => '2023-08-22', 'products' => [2 => 1], 'status' => 'completed'],
            ['date' => '2023-08-28', 'products' => [9 => 2, 10 => 1], 'status' => 'completed'],
            
            // SEPTEMBER 2023 - Turun (2 orders)
            ['date' => '2023-09-12', 'products' => [4 => 1], 'status' => 'completed'],
            ['date' => '2023-09-25', 'products' => [8 => 1], 'status' => 'pending'],
            
            // OKTOBER 2024 - Tahun baru, naik (4 orders)
            ['date' => '2024-10-08', 'products' => [1 => 1, 5 => 2], 'status' => 'completed'],
            ['date' => '2024-10-15', 'products' => [3 => 2], 'status' => 'completed'],
            ['date' => '2024-10-20', 'products' => [7 => 1, 9 => 1], 'status' => 'completed'],
            ['date' => '2024-10-28', 'products' => [2 => 1], 'status' => 'completed'],
            
            // NOVEMBER 2024 - Puncak besar (6 orders - Black Friday season)
            ['date' => '2024-11-05', 'products' => [4 => 2, 6 => 1], 'status' => 'completed'],
            ['date' => '2024-11-10', 'products' => [1 => 1], 'status' => 'completed'],
            ['date' => '2024-11-15', 'products' => [5 => 3, 6 => 2], 'status' => 'completed'],
            ['date' => '2024-11-20', 'products' => [8 => 1, 10 => 1], 'status' => 'completed'],
            ['date' => '2024-11-25', 'products' => [2 => 1, 3 => 1], 'status' => 'completed'],
            ['date' => '2024-11-28', 'products' => [7 => 2], 'status' => 'completed'],
            
            // DESEMBER 2024 - Super puncak (7 orders - Holiday season)
            ['date' => '2024-12-01', 'products' => [9 => 2, 10 => 2], 'status' => 'completed'],
            ['date' => '2024-12-05', 'products' => [1 => 1, 4 => 1], 'status' => 'completed'],
            ['date' => '2024-12-10', 'products' => [5 => 3], 'status' => 'completed'],
            ['date' => '2024-12-15', 'products' => [2 => 1, 6 => 2], 'status' => 'completed'],
            ['date' => '2024-12-18', 'products' => [3 => 2, 7 => 1], 'status' => 'shipped'],
            ['date' => '2024-12-22', 'products' => [8 => 1], 'status' => 'completed'],
            ['date' => '2024-12-28', 'products' => [1 => 1, 5 => 1, 9 => 1], 'status' => 'paid'],
            
            // JANUARI 2025 - Turun setelah holiday (3 orders)
            ['date' => '2025-01-10', 'products' => [4 => 1], 'status' => 'completed'],
            ['date' => '2025-01-20', 'products' => [10 => 2], 'status' => 'completed'],
            ['date' => '2025-01-28', 'products' => [6 => 1], 'status' => 'completed'],
            
            // FEBRUARI 2025 - Naik lagi (4 orders)
            ['date' => '2025-02-05', 'products' => [2 => 1, 3 => 1], 'status' => 'completed'],
            ['date' => '2025-02-12', 'products' => [7 => 1], 'status' => 'completed'],
            ['date' => '2025-02-18', 'products' => [5 => 2, 6 => 1], 'status' => 'shipped'],
            ['date' => '2025-02-25', 'products' => [1 => 1], 'status' => 'completed'],
        ];

        foreach ($orders as $index => $orderData) {
            $this->createManualOrder($orderData['date'], $orderData['products'], $orderData['status']);
            echo "   ✓ Order " . ($index + 1) . " created for {$orderData['date']}\n";
        }

        echo "\n✅ Seeding completed successfully!\n";
        echo "📊 Summary:\n";
        echo "   - Categories: " . Categorie::count() . "\n";
        echo "   - Products: " . Product::count() . "\n";
        echo "   - Orders: " . Order::count() . "\n";
        echo "   - Order Details: " . OrderDetail::count() . "\n";
    }

    /**
     * Create order manual dengan tanggal dan produk spesifik
     */
    private function createManualOrder(string $date, array $products, string $status): void
    {
        $createdAt = Carbon::parse($date)->addHours(rand(9, 20))->addMinutes(rand(0, 59));
        $updatedAt = (clone $createdAt)->addMinutes(rand(30, 1440));

        $order = Order::create([
            'buyer_id' => 1,
            'seller_id' => 1,
            'status' => $status,
            'total_price' => 0,
            'is_read' => in_array($status, ['completed', 'cancelled']),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        $totalPrice = 0;

        foreach ($products as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'created_at' => $createdAt,
                    'updated_at' => $updatedAt,
                ]);

                $totalPrice += ($product->price * $quantity);
            }
        }

        $order->update(['total_price' => $totalPrice]);
    }
}