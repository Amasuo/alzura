<?php

namespace App\Services\Product;

class ProductService
{
    protected $productFetcher;

    public function __construct(ProductFetcher $productFetcher)
    {
        $this->productFetcher = $productFetcher;
    }

    public function getAll(): array
    {
        return $this->productFetcher->fetchAll();
    }
}
