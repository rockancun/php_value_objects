<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\IntegerNullableImp;

final class IntegerNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new IntegerNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertMinMaxValueInstantiation(): void
    {
        $minValueAllowed = -10;
        $maxValueAllowed = 10;

        $valueObjectMinValueAllowed = new IntegerNullableImp($minValueAllowed);
        $valueObjectMaxValueAllowed = new IntegerNullableImp($maxValueAllowed);

        $this->assertEquals($minValueAllowed, $valueObjectMinValueAllowed->value());
        $this->assertEquals($maxValueAllowed, $valueObjectMaxValueAllowed->value());
    }

    public function testAssertMinValueThrownInvalidValueObjectException(): void
    {
        $minValueNotAllowed = -11;

        $this->expectException(InvalidValueObjectException::class);

        $valueObjectMinValueAllowed = new IntegerNullableImp($minValueNotAllowed);

        $this->assertEquals($minValueNotAllowed, $valueObjectMinValueAllowed->value());
    }

    public function testAssertMaxValueThrownInvalidValueObjectException(): void
    {
        $maxValueAllowed = 11;

        $this->expectException(InvalidValueObjectException::class);

        $valueObjectMaxValueAllowed = new IntegerNullableImp($maxValueAllowed);

        $this->assertEquals($maxValueAllowed, $valueObjectMaxValueAllowed->value());
    }

    public function testAssertEquals(): void
    {
        $value = 4;
        $otherValue = 3;

        $valueObject = new IntegerNullableImp($value);
        $sameValueObject = new IntegerNullableImp($value);

        $otherValueObject = new IntegerNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = 7;

        $valueObject = new IntegerNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals("$value", $valueObject);
    }
}
