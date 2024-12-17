<?php

namespace App\Services\Product\Sources;

use App\DTOs\ProductDTO;

class CSVProductSource implements ProductSource
{
    protected $file;

    public function __construct($file)
    {
        $this->file = $file;
    }

    // depends on the structure of the file
    public function fetch(): array
    {
        $data = [];
        if (($handle = fopen($this->file, 'r')) !== false) {
            // get header row
            $headers = fgetcsv($handle, null, ';');
            // read data rows
            while (($row = fgetcsv($handle, null, ';')) !== false) {
                // combine headers with data row
                if (count($headers) == count($row)) { // check valid line
                    $data[] = array_combine($headers, $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }

    public function normalize(array $data): array
    {
        $res = [];
        foreach ($data as $item) {
            $res[] = new ProductDTO(
                $item['name'],
                $item['additional'],
                $item['product_image'],
                $item['price']
            );
        }
        return $res;
    }
}
