<?php

declare(strict_types=1);

namespace Archive\Mvc\Model;

class Serial
{
    public string $value;

    public function __construct()
    {
        $this->value = self::generateSerial();
    }

    private function generateSerial(): string
    {
        return uniqid();
    }
}
