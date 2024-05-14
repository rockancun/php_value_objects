<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class UuidNullable extends UuidBase
{
    public function __construct(?string $value)
    {
        parent::__construct($value);
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }
}
