<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\JsonImp;

final class JsonTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $value = '{ "test": { "foo": "bar" } }';

        $valueObject = new JsonImp($value);

        $this->assertEquals($value, $valueObject->value());
    }
}
