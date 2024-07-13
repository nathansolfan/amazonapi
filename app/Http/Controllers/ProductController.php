<?php

namespace App\Http\Controllers;

use App\Models\PriceHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'asin' => 'required|string|unique:products',
    ]);

    $product = Product::create($validatedData);

    // create initial price
    PriceHistory::create([
        'product_id' => $product->id,
        'price' => $product->price,
        'recorded_at' => now(),
    ]);

    return response()->json($product, 201);
}

    public function updatePrice(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update(['price' => $request->price]);

        // record price change in price histories
        PriceHistory::create([
            'product_id' => $product->id,
            'price' => $request->price,
            'recorded_at' => now(),
        ]);
        return response()->json($product, 200);
    }

    // Add this method
    public function showPriceHistory($id)
{
    $product = Product::where('asin', $id)->firstOrFail();
    $priceHistories = PriceHistory::where('product_id', $product->id)->orderBy('recorded_at', 'desc')->get();

    return view('price_history', ['priceHistories' => $priceHistories]);
}

}
