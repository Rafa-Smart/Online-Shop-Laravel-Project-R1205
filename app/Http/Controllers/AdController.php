<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function index()
    {
        $seller = Seller::where('user_id', Auth::id())->first();

        $ads = Ad::where('seller_id', $seller->id)->get();
        // return $ads;
        
        return view('SellerDashboard.Ads.readAds', ['ads' => $ads]);
    }
    
    public function create()
    {
        $seller = Seller::where('user_id', Auth::id())->first();
        
        // Ambil semua produk milik seller ini
        $products = Product::where('seller_id', $seller->id)->get();
        $ads = Ad::where('seller_id', $seller->id)->get();

        return view('SellerDashboard.Ads.createAds', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'headline' => 'required|string',
            'bg_image' => 'required|image|mimes:png|max:2048', // WAJIB PNG TRANSPARAN
        ]);

        $seller = Seller::where('user_id', Auth::id())->first();

        $bgPath = $request->file('bg_image')->store('ads/backgrounds', 'public');

        Ad::create([
            'seller_id' => $seller->id,
            'product_id' => $request->product_id,

            'title' => $request->title,
            'headline' => $request->headline,
            'description' => $request->description,

            'button_text' => $request->button_text ?? 'Shop Now',
            'button_link' => route('product.detail', $request->product_id),

            'bg_image' => $bgPath,
            'is_active' => $request->is_active ? true : false,
        ]);

        return redirect()->route('ads.index')->with('success', 'Ad created!');
    }

    public function edit($id)
{
    $seller = Seller::where('user_id', Auth::id())->first();
    $ad = Ad::where('seller_id', $seller->id)->findOrFail($id);
    $products = Product::where('seller_id', $seller->id)->get();

    return view('SellerDashboard.Ads.editAds', compact('ad', 'products'));
}

public function update(Request $request, $id)
{
    $seller = Seller::where('user_id', Auth::id())->first();
    $ad = Ad::where('seller_id', $seller->id)->findOrFail($id);

    $request->validate([
        'product_id' => 'required|exists:products,id',
        'headline' => 'required|string',
        'bg_image' => 'image|mimes:png|max:2048',
    ]);

    if ($request->hasFile('bg_image')) {
        $bgPath = $request->file('bg_image')->store('ads/backgrounds', 'public');
        $ad->bg_image = $bgPath;
    }

    $ad->product_id = $request->product_id;
    $ad->headline = $request->headline;
    $ad->title = $request->title;
    $ad->description = $request->description;
    $ad->button_text = $request->button_text ?? 'Shop Now';
    $ad->is_active = $request->is_active ? true : false;
    
    $ad->save();

    return redirect()->route('ads.index')->with('success', 'Ad updated successfully');
}


public function destroy($id)
{
    $seller = Seller::where('user_id', Auth::id())->first();
    $ad = Ad::where('seller_id', $seller->id)->findOrFail($id);

    $ad->delete();

    return redirect()->route('ads.index')->with('success', 'Ad deleted.');
}

}
