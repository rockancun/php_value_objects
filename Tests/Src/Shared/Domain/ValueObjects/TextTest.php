<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\TextImp;

final class TextTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $value = '53-0021-3902';
        $valueObject = new TextImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $invalidValue = '1343-00-1893';
        $this->expectException(InvalidValueObjectException::class);
        new TextImp($invalidValue);
    }
}
