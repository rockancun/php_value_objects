<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class DecimalBase implements \Stringable
{
    protected $value;

    public const DEFAULT_MIN_VALUE = PHP_FLOAT_MIN;
    public const DEFAULT_MAX_VALUE = PHP_FLOAT_MAX;

    public function __construct(?float $value)
    {
        if (!is_null($value)) {
            $this->validate($value);
        }
        $this->value = $value;
    }

    protected function validate(float $value): void
    {
        $this->validateIfLessOrEqualsThanMaxValue($value);
        $this->validateIfGreaterOrEqualsThanMinValue($value);
    }

    private function validateIfLessOrEqualsThanMaxValue(float $value): void
    {
        if ($value > $this->getMaxValue()) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Max value is <%s>.', static::class, $value, $this->getMaxValue()));
        }
    }

    private function validateIfGreaterOrEqualsThanMinValue(float $value): void
    {
        if ($value < $this->getMinValue()) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Min value is <%s>.', static::class, $value, $this->getMinValue()));
        }
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return "$this->value";
    }

    protected function getMinValue(): float
    {
        return self::DEFAULT_MIN_VALUE;
    }

    protected function getMaxValue(): float
    {
        return self::DEFAULT_MAX_VALUE;
    }
}
