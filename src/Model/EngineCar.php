<?php

declare(strict_types=1);

namespace Archive\Mvc\Model;

use Archive\Mvc\Contract\Vehicle;
use Archive\Mvc\Interface\EngineVehicle;
use Archive\Mvc\Database\EngineCarMapper;

require_once __DIR__ . '/../../vendor/autoload.php';

class EngineCar extends Vehicle implements EngineVehicle
{
    public function __construct(
        public string $manufacturer,
        public string $model,
        public float $price,
        public int $tax,
        public int $discount,
        public ?string $serial,
        public string $engine
    ) {
        parent::__construct(
            $manufacturer,
            $model,
            $price,
            $tax,
            $discount,
            $serial
        );

        $this->price = self::checkPrice(
            $this->price,
            $this->tax,
            $this->discount
        );

        $this->serial = self::checkSerial($this->serial);
    }

    public function save(): void
    {
        $mapper = new EngineCarMapper;
        $mapper->insert($this);
    }

    public function infos(): array
    {
        $infos['manufacturer'] = $this->manufacturer;
        $infos['model'] = $this->model;
        $infos['price'] = $this->price;
        $infos['tax'] = $this->tax;
        $infos['discount'] = $this->discount;
        $infos['serial'] = $this->serial;
        $infos['engine'] = $this->engine;
        return $infos;
    }

    public function engineInfos(): string
    {
        return $this->engine;
    }

    public function edit(string $model, string $serial): void
    {
        $mapper = new EngineCarMapper;
        $mapper->update($model, $serial);
    }

    private function checkPrice(float $price, int $tax, int $discount): float
    {
        $price = new Price(
            $price,
            $tax,
            $discount
        );
        return $price->amount;
    }

    private function checkSerial(?string $serial): string
    {
        if (is_null($serial)) {
            $serial = new Serial;
            return $serial->value;
        }
        return $serial;
    }
}
