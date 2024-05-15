<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\ValueObjects\TextNullable;

class TextNullableImp extends TextNullable
{
    private const MIN_TEXT_LENGTH = 1;
    private const MAX_TEXT_LENGTH = 5;

    protected function getMinLength(): int
    {
        return self::MIN_TEXT_LENGTH;
    }

    protected function getMaxLength(): int
    {
        return self::MAX_TEXT_LENGTH;
    }
}
