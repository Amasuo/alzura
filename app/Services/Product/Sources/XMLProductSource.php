<?php

namespace App\Services\Product\Sources;

use App\DTOs\ProductDTO;

class XMLProductSource implements ProductSource
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    // depends on the structure of the file
    public function fetch(): array
    {
        $xml = simplexml_load_file($this->file);
        $data = [];

        foreach ($xml->product as $item) {
            $data[] = new ProductDTO(
                (string) $item->title,
                (string) $item->title,
                (string) $item->title,
                (string) $item->title
            );
        }
        return $data;
    }

    public function normalize(array $data): array
    {
        // the xml file is already normalized, but we ensure consistency
        return $data;
    }
}
