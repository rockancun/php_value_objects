<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class Decimal extends DecimalBase
{
    public function __construct(float $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}
