<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\Uuid;

class UuidImp extends Uuid
{
    protected function validate(string $value): void
    {
        parent::validate($value);
        $this->startWithValidation($value);
    }

    private function startWithValidation(string $value)
    {
        if (!str_starts_with($value, 'aaaaaaaa-')) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }
}
