<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class DateTimeNullable extends DateTimeBase
{
    protected $value;

    public function __construct(?\DateTime $value)
    {
        $this->value = $value;
    }

    public function value(): ?\DateTime
    {
        return $this->value;
    }
}
