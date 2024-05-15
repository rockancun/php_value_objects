<?php

declare(strict_types=1);

namespace Tests\Src\Shared\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use Tests\Src\Implementations\BooleanImp;

final class BooleanTest extends TestCase
{
    public function testAssertInstantiation(): void
    {
        $value = true;

        $valueObject = new BooleanImp($value);

        $this->assertEquals($value, $valueObject->value());
    }
}
