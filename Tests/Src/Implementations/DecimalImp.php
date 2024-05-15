<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\Decimal;

class DecimalImp extends Decimal
{
    protected function validate(float $value): void
    {
        parent::validate($value);
        if (!$this->isRoundedUpToTheNextHighestInteger($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }

    private function isRoundedUpToTheNextHighestInteger(float $value)
    {
        $integer = floor($value);
        $fraction = $value - $integer;

        return $fraction >= 0.5;
    }
}
