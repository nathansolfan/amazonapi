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

    public function show($asin)
    {
        $productData = $this->amazonDataService->getProductData($asin);
        return view('amazon_product', compact('productData'));
    }
}
