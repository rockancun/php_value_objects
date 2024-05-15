<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Src\Shared\Domain\ValueObjects\Integer;

class IntegerImp extends Integer
{
    protected function validate(int $value): void
    {
        parent::validate($value);
        if (!$this->onlyAllowPairValues($value)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $value));
        }
    }

    private function onlyAllowPairValues(int $value): bool
    {
        return ($value % 2) == 0;
    }
}
