<?php

namespace App\DataTransfer\Report;

class ReportProduct
{
    private string $type;
    private string $product_value;
    private string $created_at;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getProductValue(): string
    {
        return $this->product_value;
    }

    /**
     * @param string $productValue
     *
     * @return void
     */
    public function setProductValue(string $productValue): void
    {
        $this->product_value = $productValue;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $createdAt
     *
     * @return void
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->created_at = $createdAt;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [$this->getType(), $this->getProductValue(), $this->getCreatedAt()];
    }
}
