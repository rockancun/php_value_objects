<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class UuidBase implements \Stringable
{
    protected $value;

    public const VALID_UUID_REGEX = '^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$';

    public function __construct(?string $value)
    {
        if (!is_null($value)) {
            $this->validate($value);
        }
        $this->value = $value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return is_null($this->value) ? '' : $this->value;
    }

    protected function validate(string $value): void
    {
        if (!$this->validateUuidFormat($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }

    private function validateUuidFormat($value): bool
    {
        return (bool) preg_match('~'.self::VALID_UUID_REGEX.'~', $value);
    }
}
