<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\TextNullableImp;

final class TextNullableTest extends TestCase
{
    public function testAssertNullableInstantiation(): void
    {
        $value = null;

        $valueObject = new TextNullableImp($value);

        $this->assertEquals($value, $valueObject->value());
    }

    public function testAssertMinMaxLengthInstantiation(): void
    {
        $minLengthText = 'a';
        $maxLengthText = 'abcde';

        $valueObjectMinLengthText = new TextNullableImp($minLengthText);
        $valueObjectMaxLengthText = new TextNullableImp($maxLengthText);

        $this->assertEquals($minLengthText, $valueObjectMinLengthText->value());
        $this->assertEquals($maxLengthText, $valueObjectMaxLengthText->value());
    }

    public function testAssertMinTextThrownInvalidValueObjectException(): void
    {
        $minLengthText = '';

        $this->expectException(InvalidValueObjectException::class);

        new TextNullableImp($minLengthText);
    }

    public function testAssertMaxTextThrownInvalidValueObjectException(): void
    {
        $maxLengthText = 'abcdef';

        $this->expectException(InvalidValueObjectException::class);

        new TextNullableImp($maxLengthText);
    }

    public function testAssertEquals(): void
    {
        $value = 'a';
        $otherValue = 'abcde';

        $valueObject = new TextNullableImp($value);
        $sameValueObject = new TextNullableImp($value);

        $otherValueObject = new TextNullableImp($otherValue);

        $this->assertTrue($valueObject->equals($sameValueObject));
        $this->assertFalse($valueObject->equals($otherValueObject));
    }

    public function testAssertToString(): void
    {
        $value = 'abcde';

        $valueObject = new TextNullableImp($value);

        // Automatic call to __toString()
        $this->assertEquals($value, $valueObject);
    }
}
