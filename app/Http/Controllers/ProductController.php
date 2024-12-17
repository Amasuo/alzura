<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    // Laravel’s built-in dependency injection to pass ProductFetcher into ProductService and the controller
    // Providers > ProductServiceProvider
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getAll()
    {
        $data = $this->productService->getAll();
        return $data;
    }
}
