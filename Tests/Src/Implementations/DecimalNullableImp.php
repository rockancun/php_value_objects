<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\ValueObjects\DecimalNullable;

class DecimalNullableImp extends DecimalNullable
{
    private const MIN_VALUE = 0.0;
    private const MAX_VALUE = 10.0;

    protected function getMinValue(): float
    {
        return self::MIN_VALUE;
    }

    protected function getMaxValue(): float
    {
        return self::MAX_VALUE;
    }
}
