<?php

namespace App\Http\Controllers;

use App\Models\PriceHistory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::create($request->all());

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
        $priceHistories = PriceHistory::where('product_id', $id)->get();
        return view('price_history', compact('priceHistories'));
    }
}
