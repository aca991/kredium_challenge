<?php

namespace App\DataTransfer\Report;

class ReportProduct
{
    private string $type;
    private float $amount;
    private float $value;
    private float $down_payment_amount;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    public function getDownPaymentAmount(): float
    {
        return $this->down_payment_amount;
    }

    public function setDownPaymentAmount(float $down_payment_amount): void
    {
        $this->down_payment_amount = $down_payment_amount;
    }
}
