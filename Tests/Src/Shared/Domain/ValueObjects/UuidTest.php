<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\UuidImp;

final class UuidTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $value = 'aaaaaaaa-8c13-4988-a006-a5ad9ed859d2';

        $valueObject = new UuidImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $invalidValue = 'b8b9da1a-8c13-4988-a006-a5ad9ed859d2';
        $this->expectException(InvalidValueObjectException::class);
        new UuidImp($invalidValue);
    }
}
