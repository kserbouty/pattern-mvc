<?php

namespace Mvc\Contract;

use Mvc\Model\EngineCar;

interface CarMapper
{
    function insert(EngineCar $engine_car): void;

    function find(string $serial): EngineCar;

    function findAll(): array;

    function update(string $model, string $serial): void;

    function delete(string $serial): void;
}