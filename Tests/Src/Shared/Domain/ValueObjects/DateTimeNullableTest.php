<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\DateTimeNullableImp;

final class DateTimeNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new DateTimeNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertInstantiation(): void
    {
        $value = new \DateTime();

        $valueObject = new DateTimeNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertEquals(): void
    {
        $value = new \DateTime();
        $otherValue = new \DateTime('2013-03-05 00:00:00+00');
        $otherValue->modify('+12 hours');

        $valueObject = new DateTimeNullableImp($value);
        $sameValueObject = new DateTimeNullableImp($value);

        $otherValueObject = new DateTimeNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = new \DateTime();

        $valueObject = new DateTimeNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals($value->format('Y-m-d H:i:s'), $valueObject);
    }
}
