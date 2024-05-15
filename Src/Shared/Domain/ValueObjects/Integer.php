<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class Integer extends IntegerBase
{
    public function __construct(int $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
