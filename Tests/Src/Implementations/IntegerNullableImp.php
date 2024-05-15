<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\ValueObjects\IntegerNullable;

class IntegerNullableImp extends IntegerNullable
{
    private const MIN_VALUE = -10;
    private const MAX_VALUE = 10;

    protected function getMinValue(): int
    {
        return self::MIN_VALUE;
    }

    protected function getMaxValue(): int
    {
        return self::MAX_VALUE;
    }
}
