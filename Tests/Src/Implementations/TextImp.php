<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\Text;

class TextImp extends Text
{
    private const MIN_TEXT_LENGTH = 12;
    private const MAX_TEXT_LENGTH = 12;

    private const VALID_PHONE_REGEX = '^[0-9]{2}-[0-9]{4}-[0-9]{4}$';

    protected function getMinLength(): int
    {
        return self::MIN_TEXT_LENGTH;
    }

    protected function getMaxLength(): int
    {
        return self::MAX_TEXT_LENGTH;
    }

    protected function validate(string $value): void
    {
        parent::validate($value);
        if (!$this->isValidPhoneFormat($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }

    private function isValidPhoneFormat($value): bool
    {
        return (bool) preg_match('~'.self::VALID_PHONE_REGEX.'~', $value);
    }
}
