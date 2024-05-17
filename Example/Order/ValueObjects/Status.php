<?php

declare(strict_types=1);

namespace Example\Order\ValueObjects;

use Src\Shared\Domain\ValueObjects\Enum;

final class Status extends Enum
{
    public const RECEIVED = 'received';
    public const IN_TRANSIT = 'in_transit';
    public const DELIVERED = 'delivered';
}
