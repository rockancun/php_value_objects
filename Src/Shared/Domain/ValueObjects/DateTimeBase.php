<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class DateTimeBase implements \Stringable
{
    protected $value;

    public function __construct(?\DateTime $value)
    {
        $this->value = $value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return is_null($this->value) ? '' : $this->value->format('Y-m-d H:i:s');
    }
}
