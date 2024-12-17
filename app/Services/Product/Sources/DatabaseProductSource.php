<?php

namespace App\Services\Product\Sources;

use App\DTOs\ProductDTO;
use App\Models\Product;

class DatabaseProductSource implements ProductSource
{
    public function fetch(): array
    {
        return Product::all()->toArray();
    }

    public function normalize(array $data): array
    {
        $res = [];
        foreach ($data as $item) {
            $res[] = new ProductDTO(
                $item['title'],
                $item['description'],
                $item['image_link'],
                $item['price']
            );
        }
        return $res;
    }
}
