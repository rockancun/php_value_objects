<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\DecimalNullableImp;

final class DecimalNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new DecimalNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertMinMaxValueInstantiation(): void
    {
        $minValueAllowed = 0.0;
        $maxValueAllowed = 10.0;

        $valueObjectMinValueAllowed = new DecimalNullableImp($minValueAllowed);
        $valueObjectMaxValueAllowed = new DecimalNullableImp($maxValueAllowed);

        $this->assertEquals($minValueAllowed, $valueObjectMinValueAllowed->value());
        $this->assertEquals($maxValueAllowed, $valueObjectMaxValueAllowed->value());
    }

    public function testAssertMinValueThrownInvalidValueObjectException(): void
    {
        $minValueNotAllowed = -1.0;

        $this->expectException(InvalidValueObjectException::class);

        $valueObjectMinValueAllowed = new DecimalNullableImp($minValueNotAllowed);

        $this->assertEquals($minValueNotAllowed, $valueObjectMinValueAllowed->value());
    }

    public function testAssertMaxValueThrownInvalidValueObjectException(): void
    {
        $maxValueAllowed = 11.0;

        $this->expectException(InvalidValueObjectException::class);

        $valueObjectMaxValueAllowed = new DecimalNullableImp($maxValueAllowed);

        $this->assertEquals($maxValueAllowed, $valueObjectMaxValueAllowed->value());
    }

    public function testAssertEquals(): void
    {
        $value = 4.0;
        $otherValue = 3.0;

        $valueObject = new DecimalNullableImp($value);
        $sameValueObject = new DecimalNullableImp($value);

        $otherValueObject = new DecimalNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = 7.0;

        $valueObject = new DecimalNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals("$value", $valueObject);
    }
}
