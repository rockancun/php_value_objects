<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\DateTimeImp;

final class DateTimeTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $value = new \DateTime();

        $valueObject = new DateTimeImp($value);

        $this->assertEquals($value, $valueObject->value());
    }
}
