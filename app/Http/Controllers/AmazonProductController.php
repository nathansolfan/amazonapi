<?php

namespace App\Http\Controllers;

use App\Services\AmazonDataService;
use Illuminate\Http\Request;

class AmazonProductController extends Controller
{
    protected $amazonDataService;

    public function __construct(AmazonDataService $amazonDataService)
    {
        $this->amazonDataService = $amazonDataService;
    }

    public function search(Request $request)
    {
        $query = $request->input('query', 'Phone');
        $products = $this->amazonDataService->searchProducts($query);
        return view('amazon_product', compact('products'));
    }
}
