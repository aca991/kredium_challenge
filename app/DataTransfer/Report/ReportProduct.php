<?php

namespace App\DataTransfer\Report;

class ReportProduct
{
    private string $type;
    private string $product_value;
    private string $created_at;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getProductValue(): string
    {
        return $this->product_value;
    }

    public function setProductValue(string $productValue): void
    {
        $this->product_value = $productValue;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->created_at = $createdAt;
    }
}
