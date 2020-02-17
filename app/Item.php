<?php

namespace App;

class Item
{
    public Product $product;
    public int $quantity;
    public int $price;

    public function __construct(Product $product, int $quantity, ?int $price = null)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $price ?? $product->price;
    }
}
