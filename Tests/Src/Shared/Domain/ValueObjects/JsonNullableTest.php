<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\JsonNullableImp;

final class JsonNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new JsonNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertInstantiation(): void
    {
        $value = '{ "test": { "foo": "bar" } }';

        $valueObject = new JsonNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertEquals(): void
    {
        $value = '{ "test": { "foo": "bar" } }';
        $otherValue = '{ "other_test": { "foo": "bar" } }';

        $valueObject = new JsonNullableImp($value);
        $sameValueObject = new JsonNullableImp($value);

        $otherValueObject = new JsonNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = '{ "test": { "foo": "bar" } }';

        $valueObject = new JsonNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals($value, $valueObject);
    }
}
