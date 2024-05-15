<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class TextBase implements \Stringable
{
    protected $value;

    public const DEFAULT_MIN_TEXT_LENGTH = 0;
    public const DEFAULT_MAX_TEXT_LENGTH = 1048576; // 1 Mb

    public function __construct(?string $value)
    {
        if (!is_null($value)) {
            $this->validate($value);
        }
        $this->value = $value;
    }

    protected function validate(string $value): void
    {
        $this->validateIfLowerOrEqualsThanMaxLength($value);
        $this->validateIfLargerOrEqualsThanMinLength($value);
    }

    private function validateIfLowerOrEqualsThanMaxLength(string $value): void
    {
        if (strlen($value) > $this->getMaxLength()) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Max length is <%s>.', static::class, $value, $this->getMaxLength()));
        }
    }

    private function validateIfLargerOrEqualsThanMinLength(string $value): void
    {
        if (strlen($value) < $this->getMinLength()) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Min length is <%s>.', static::class, $value, $this->getMinLength()));
        }
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    protected function getMinLength(): int
    {
        return self::DEFAULT_MIN_TEXT_LENGTH;
    }

    protected function getMaxLength(): int
    {
        return self::DEFAULT_MAX_TEXT_LENGTH;
    }
}
