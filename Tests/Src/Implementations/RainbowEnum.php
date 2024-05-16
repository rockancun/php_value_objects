<?php

declare(strict_types=1);

namespace Tests\Src\Implementations;

use Src\Shared\Domain\ValueObjects\Enum;

final class RainbowEnum extends Enum
{
    public const RED = 'red';
    public const ORANGE = 'orange';
    public const YELLOW = 'yellow';
    public const GREEN = 'green';
    public const BLUE = 'blue';
    public const INDIGO = 'indigo';
    public const VIOLET = 'violet';
}
