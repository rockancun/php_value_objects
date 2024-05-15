<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class BooleanBase implements \Stringable
{
    protected $value;

    public function __construct(?bool $value)
    {
        $this->value = $value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return is_null($this->value) ? '' : "{$this->value}";
    }
}
