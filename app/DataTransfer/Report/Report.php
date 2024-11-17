<?php

namespace App\DataTransfer\Report;

class Report
{
    private array $products;

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }


}
