<?php

namespace App\Services\Product\Sources;

interface ProductSource
{
    public function fetch(): array;
    public function normalize(array $data): array;
}
