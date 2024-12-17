<?php

namespace App\Services\Product;

use App\Services\Product\Sources\ProductSource;

class ProductFetcher
{
    protected $sources = [];

    public function __construct(ProductSource ...$sources)
    {
        $this->sources = $sources;
    }

    public function fetchAll(): array
    {
        $allData = [];

        // sequential
        foreach ($this->sources as $source) {
            $data = $source->fetch();
            $allData = array_merge($allData, $source->normalize($data));
        }

        // we can replace the previous for loop with parallel fetching (this requires a queue)
        // example :
        // $jobs = collect($this->sources)->map(fn ($source) => new FetchSourceJob($source));
        // $results = Bus::batch($jobs)->dispatch();

        return $allData;
    }
}
