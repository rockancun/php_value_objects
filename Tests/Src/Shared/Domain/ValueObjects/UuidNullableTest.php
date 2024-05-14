<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\UuidNullableImp;

final class UuidNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new UuidNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertInstantiation(): void
    {
        $value = 'b8b9da1a-8c13-4988-a006-a5ad9ed859d2';

        $valueObject = new UuidNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $invalidValue = 'b8b9da1a-8c13-4988-a006-ZZZZZZZZZZZZ';
        $this->expectException(InvalidValueObjectException::class);
        new UuidNullableImp($invalidValue);
    }

    public function testAssertEquals(): void
    {
        $value = 'b8b9da1a-8c13-4988-a006-a5ad9ed859d2';
        $otherValue = '0011aa7f-1dc3-486d-bd69-d9aada552cfa';

        $valueObject = new UuidNullableImp($value);
        $sameValueObject = new UuidNullableImp($value);

        $otherValueObject = new UuidNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = 'b8b9da1a-8c13-4988-a006-a5ad9ed859d2';

        $valueObject = new UuidNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals($value, $valueObject);
    }
}
