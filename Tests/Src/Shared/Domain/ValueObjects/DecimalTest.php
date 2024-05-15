<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\DecimalImp;

final class DecimalTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $roundUpValue = 2.5;
        $valueObject = new DecimalImp($roundUpValue);

        $this->assertEquals($roundUpValue, $valueObject->value());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $roundDownValue = 2.4;
        $this->expectException(InvalidValueObjectException::class);
        new DecimalImp($roundDownValue);
    }
}
