<?php

declare(strict_types=1);

namespace Mvc\Model;

class Price
{
    public function __construct(
        public float $amount,
        public int $tax,
        public int $discount

    ) {
        if ($this->tax) {
            $this->amount = self::applyTax($this->tax, $this->amount);
        }

        if ($this->discount) {
            $this->amount = self::applyDiscount($this->discount, $this->amount);
        }
    }

    private function applyTax(int $tax, float $amount): float
    {
        $amount += (($tax / 100) * $amount);
        return round($amount, 2);
    }

    private function applyDiscount(int $discount, float $amount): float
    {
        $amount -= (($discount / $amount) * 100);
        return round($amount, 2);
    }
}
