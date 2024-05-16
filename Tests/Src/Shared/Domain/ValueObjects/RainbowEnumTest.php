<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exceptions\InvalidValueObjectException;
use Tests\Src\Implementations\RainbowEnum;

class RainbowEnumTest extends TestCase
{
    public function testAssertInstantiationWithNewOperatorAndFactoryMethod()
    {
        $this->assertEquals(new RainbowEnum('red'), RainbowEnum::red());
        $this->assertEquals(new RainbowEnum('orange'), RainbowEnum::orange());
        $this->assertEquals(new RainbowEnum('yellow'), RainbowEnum::yellow());
        $this->assertEquals(new RainbowEnum('green'), RainbowEnum::green());
        $this->assertEquals(new RainbowEnum('blue'), RainbowEnum::blue());
        $this->assertEquals(new RainbowEnum('indigo'), RainbowEnum::indigo());
        $this->assertEquals(new RainbowEnum('violet'), RainbowEnum::violet());
    }

    public function testAssertThrownInvalidValueObjectException(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $invalidValue = 'black';
        new RainbowEnum($invalidValue);
    }

    public function testAssertNotEquals()
    {
        $this->assertNotEquals(new RainbowEnum('red'), RainbowEnum::orange());
        $this->assertNotEquals(new RainbowEnum('orange'), RainbowEnum::red());
        $this->assertNotEquals(new RainbowEnum('yellow'), RainbowEnum::red());
        $this->assertNotEquals(new RainbowEnum('green'), RainbowEnum::red());
        $this->assertNotEquals(new RainbowEnum('blue'), RainbowEnum::red());
        $this->assertNotEquals(new RainbowEnum('indigo'), RainbowEnum::red());
        $this->assertNotEquals(new RainbowEnum('violet'), RainbowEnum::red());
    }

    public function testAssertToString()
    {
        $this->assertEquals(RainbowEnum::RED, RainbowEnum::red());
        $this->assertEquals(RainbowEnum::ORANGE, RainbowEnum::orange());
        $this->assertEquals(RainbowEnum::YELLOW, RainbowEnum::yellow());
        $this->assertEquals(RainbowEnum::GREEN, RainbowEnum::green());
    }

    public function testAssertValue()
    {
        $this->assertEquals(RainbowEnum::BLUE, RainbowEnum::blue()->value());
        $this->assertEquals(RainbowEnum::INDIGO, RainbowEnum::indigo()->value());
        $this->assertEquals(RainbowEnum::VIOLET, RainbowEnum::violet()->value());
    }

    public function testAssertValues()
    {
        $rainbowArray = [
            'red' => 'red',
            'orange' => 'orange',
            'yellow' => 'yellow',
            'green' => 'green',
            'blue' => 'blue',
            'indigo' => 'indigo',
            'violet' => 'violet',
        ];

        $this->assertEquals($rainbowArray, RainbowEnum::values());
    }
}
