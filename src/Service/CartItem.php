<?php

namespace App\Service;

use App\Entity\Product;

class CartItem
{
    public function __construct(
        protected Product $product,
        protected int $qantity
    ) {
    }

    public function getTotal(): int
    {
        return $this->product->getPrice() * $this->qantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->qantity;
    }
}