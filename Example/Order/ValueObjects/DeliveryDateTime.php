<?php

declare(strict_types=1);

namespace Example\Order\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\DateTime;

/**
 * Delivery date time most be grater than current moment.
 */
final class DeliveryDateTime extends DateTime
{
    protected function validate(\DateTime $value): void
    {
        if (!$this->isGreaterThanCurrentDateTime($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Delivery date time most be grater than current moment.', static::class, $value));
        }
    }

    private function isGreaterThanCurrentDateTime(\DateTime $value): bool
    {
        $now = new \DateTime('now');

        return $value > $now;
    }
}
