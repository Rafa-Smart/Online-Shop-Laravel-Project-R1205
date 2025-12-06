<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    protected $salesService;

    public function __construct()
    {
        // Inject your sales service here
        // $this->salesService = app('SalesService');
    }

    public function create()
    {
        // Jika sudah menjadi seller → langsung ke dashboard
        if (Auth::user()->seller) {
            return redirect()->route('seller.dashboard');
        }

        return view('seller.create'); // form buka toko
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'description' => 'nullable|string',
            'img' => 'nullable|file|image|max:2048', // max 2MB
        ]);

        // Simpan deskripsi, default '0' jika kosong
        $description = $request->description ?: '0';

        // Simpan gambar
        $imgFileName = '0'; // default skip
        if ($request->hasFile('img') && $request->img != '0') {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            // nama file = nama toko, spasi diganti underscore, lowercase
            $imgFileName = strtolower(preg_replace('/\s+/', '_', $request->store_name)).'.'.$extension;

            // Hapus file lama jika ada (opsional, misal jika update nanti)
            // Storage::disk('public')->delete('seller_images/' . $imgFileName);

            // Simpan file ke storage/app/public/seller_images
            $file->storeAs('seller_images', $imgFileName, 'public');

        }

        // Simpan ke database
        $seller = Seller::create([
            'user_id' => Auth::id(),
            'store_name' => $request->store_name,
            'phone_number' => $request->phone_number,
            'description' => $description,
            'img' => $imgFileName,
        ]);

        return redirect('/home')->with('success', 'Toko berhasil dibuat!');
    }

    public function dashboard()
    {
        $seller = Auth::user()->seller;

        if (! $seller) {
            return redirect()->route('seller.create');
        }

        $sellerId = Auth::user()->seller->id;

        /* ------------------------------------------
         * 1. TOTAL PENDAPATAN (completed only)
         * ------------------------------------------ */
        $totalRevenue = Order::where('seller_id', $sellerId)
            ->where('status', 'completed')
            ->sum('total_price');

        /* ------------------------------------------
         * 2. TOTAL PRODUK TERJUAL (sum from order_details)
         * ------------------------------------------ */
        $totalSold = OrderDetail::whereHas('order', function ($q) use ($sellerId) {
            $q->where('seller_id', $sellerId)
                ->where('status', 'completed');
        })
            ->sum('quantity');

        /* ------------------------------------------
         * 3. TOTAL PRODUK TOKO PENJUAL
         * ------------------------------------------ */
        $totalProducts = Product::where('seller_id', $sellerId)->count();

        /* ------------------------------------------
         * 4. TOP KATEGORI (Order terbanyak berdasarkan kategori)
         * ------------------------------------------ */
        $topCategories = OrderDetail::select(
            'categories.category_name',
            DB::raw('COUNT(order_details.id) as total_orders'),
            DB::raw('SUM(order_details.quantity) as total_quantity'),
            DB::raw('SUM(order_details.quantity * order_details.price) as total_revenue')
        )
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.seller_id', $sellerId)
            ->where('orders.status', 'completed')
            ->groupBy('categories.id', 'categories.category_name')
            ->orderByDesc('total_orders')
            ->limit(6)
            ->get();

        // return $topCategories;

        /* ------------------------------------------
         * 5. PRODUK TERLARIS (Best Selling Products)
         * ------------------------------------------ */
        $topProducts = OrderDetail::select(
            'products.id',
            'products.product_name',
            'products.img',
            'products.price',
            'categories.category_name',
            DB::raw('SUM(order_details.quantity) as total_sold'),
            DB::raw('SUM(order_details.quantity * order_details.price) as revenue')
        )
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.seller_id', $sellerId)
            ->where('orders.status', 'completed')
            ->groupBy('products.id', 'products.product_name', 'products.img', 'products.price', 'categories.category_name')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        return view('SellerDashboard.sellerDashboard', [
            'seller' => $seller,
            'totalSold' => $totalSold,
            'totalRevenue' => $totalRevenue,
            'totalProducts' => $totalProducts,
            'topCategories' => $topCategories,
            'topProducts' => $topProducts,
        ]);
    }

    public function statistics(Request $request)
    {
        $type = $request->query('type', 'daily');
        $user = Auth::user();

        // Pastikan seller ada
        if (! $user->seller) {
            return response()->json([
                'error' => 'Seller profile not found',
            ], 404);
        }

        $sellerId = $user->seller->id;

        // Ambil data berdasarkan type
        switch ($type) {
            case 'daily':
                $data = $this->salesService->getDailySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->date,
                        'total' => (int) $row->total,
                    ]);
                break;

            case 'monthly':
                $data = $this->salesService->getMonthlySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->year.'-'.str_pad($row->month, 2, '0', STR_PAD_LEFT),
                        'total' => (int) $row->total,
                    ]);
                break;

            case 'yearly':
                $data = $this->salesService->getYearlySales($sellerId)
                    ->map(fn ($row) => [
                        'label' => $row->year,
                        'total' => (int) $row->total,
                    ]);
                break;

            default:
                return response()->json([
                    'error' => 'Invalid type',
                ], 400);
        }

        return response()->json([
            'status' => 'success',
            'type' => $type,
            'data' => $data,
        ]);
    }
}
