<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class IntegerBase implements \Stringable
{
    protected $value;

    public const DEFAULT_MIN_VALUE = PHP_INT_MIN;
    public const DEFAULT_MAX_VALUE = PHP_INT_MAX;

    public function __construct(?int $value)
    {
        if (!is_null($value)) {
            $this->validate($value);
        }
        $this->value = $value;
    }

    protected function validate(int $value): void
    {
        $this->validateIfLessOrEqualsThanMaxLength($value);
        $this->validateIfGreaterOrEqualsThanMinLength($value);
    }

    private function validateIfLessOrEqualsThanMaxLength(int $value): void
    {
        if ($value > $this->getMaxValue()) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Max value is <%s>.', static::class, $value, $this->getMaxValue()));
        }
    }

    private function validateIfGreaterOrEqualsThanMinLength(int $value): void
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

    protected function getMinValue(): int
    {
        return self::DEFAULT_MIN_VALUE;
    }

    protected function getMaxValue(): int
    {
        return self::DEFAULT_MAX_VALUE;
    }
}
