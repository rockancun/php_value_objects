<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\IntegerImp;

final class IntegerTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $pairValue = 2;
        $valueObject = new IntegerImp($pairValue);

        $this->assertEquals($pairValue, $valueObject->value());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $oddValue = 3;
        $this->expectException(InvalidValueObjectException::class);
        new IntegerImp($oddValue);
    }
}
