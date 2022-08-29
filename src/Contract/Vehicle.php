<?php

namespace Archive\Mvc\Contract;

abstract class Vehicle
{
    protected function __construct(
        public string $manufacturer,
        public string $model,
        public float $price,
        public int $tax,
        public int $discount,
        public ?string $serial
    ) {
    }

    abstract function save(): void;

    abstract function infos(): array;

    abstract function edit(string $model, string $serial): void;
}
