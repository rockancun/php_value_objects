<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class BooleanNullable extends BooleanBase
{
    protected $value;

    public function __construct(?bool $value)
    {
        $this->value = $value;
    }

    public function value(): ?bool
    {
        return $this->value;
    }
}
