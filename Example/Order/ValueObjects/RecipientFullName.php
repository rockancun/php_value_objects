<?php

declare(strict_types=1);

namespace Example\Order\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\Text;

/**
 * Full name cant be empty and most be less than the assigned
 * space in the paper form 256 characters
 * Only letters and spaces are allowed.
 */
final class RecipientFullName extends Text
{
    private const MIN_NAME_LENGTH = 1;
    private const MAX_NAME_LENGTH = 256;

    protected function getMinLength(): int
    {
        return self::MIN_NAME_LENGTH;
    }

    protected function getMaxLength(): int
    {
        return self::MAX_NAME_LENGTH;
    }

    protected function validate(string $value): void
    {
        parent::validate($value);
        if (!$this->hasValidName($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>. Only letters and spaces are allowed.', static::class, $value));
        }
    }

    private function hasValidName(string $value): bool
    {
        return (bool) preg_match("/^[a-zA-Z ']+$/", $value);
    }
}
