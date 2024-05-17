<?php

declare(strict_types=1);

namespace Example\Order\ValueObjects;

use Src\Shared\Domain\ValueObjects\Decimal;

/**
 * Payment amount cant be negative.
 */
final class PaymentAmount extends Decimal
{
    private const MIN_VALUE = 0.0;

    protected function getMinValue(): float
    {
        return self::MIN_VALUE;
    }
}
