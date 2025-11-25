<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {


    //      Order::factory()
    //     ->count(10)
    //     ->daily()
    //     ->has(OrderDetail::factory()->count(2), 'details')
    //     ->create();

    // // 🔥 Generate 12 bulan terakhir
    // Order::factory()
    //     ->count(12)
    //     ->monthly()
    //     ->has(OrderDetail::factory()->count(2), 'details')
    //     ->create();

    // // 🔥 Generate 3 tahun terakhir
    // Order::factory()
    //     ->count(3)
    //     ->yearly()
    //     ->has(OrderDetail::factory()->count(2), 'details')
    //     ->create();
        // ====== 1. KATEGORI ======
        $categories = Categorie::factory(8)->create();

        // ====== 2. USER BUYER & SELLER ======
        // $sellers = Seller::factory(8)->create();
        // $buyers = Buyer::factory(15)->create();

        // ====== 3. PRODUK ======
        $products = collect();  

        // foreach ($sellers as $seller) {
        //     $products = $products->merge(
        //         Product::factory(5)->create([
        //             'seller_id' => $seller->id,
        //             'category_id' => $categories->random()->id,
        //         ])
        //     );
        // }

        // ====== 4. FOTO PRODUK ======
        foreach ($products as $product) {
            ProductPhoto::factory(3)->create([
                'product_id' => $product->id,
            ]);
        }


        // ====== 7. CART ======
        // foreach ($buyers as $buyer) {
        //     Cart::factory(2)->create([
        //         'buyer_id' => $buyer->id,
        //         'product_id' => $products->random()->id,
        //     ]);
        // }

        // ====== 8. COMMENT ======
        // foreach ($buyers as $buyer) {
        //     Comment::factory(2)->create([
        //         'buyer_id' => $buyer->id,
        //         'product_id' => $products->random()->id,
        //     ]);
        // }

        // Selesai
        echo "Seeder selesai dijalankan!\n";
    }
}
