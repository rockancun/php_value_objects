<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\BooleanNullableImp;

final class BooleanNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new BooleanNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertInstantiation(): void
    {
        $value = true;

        $valueObject = new BooleanNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertEquals(): void
    {
        $value = true;
        $otherValue = false;

        $valueObject = new BooleanNullableImp($value);
        $sameValueObject = new BooleanNullableImp($value);

        $otherValueObject = new BooleanNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = true;

        $valueObject = new BooleanNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals("{$value}", $valueObject);
    }
}
