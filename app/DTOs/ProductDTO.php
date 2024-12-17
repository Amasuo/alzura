<?php

namespace App\DTOs;

class ProductDTO
{
    public string $title;
    public string $description;
    public string $image_link;
    public float $price;

    public function __construct(string $title, string $description, string $image_link, float $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image_link = $image_link;
        $this->price = $price;
    }
}
