<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class JsonBase implements \Stringable
{
    protected $value;

    public function __construct(?string $value)
    {
        if (!is_null($value)) {
            $this->validate($value);
        }
        $this->value = $value;
    }

    protected function validate(string $json): void
    {
        if (!$this->isValidJson($json)) {
            throw new InvalidValueObjectException(sprintf('<%s> does not allow the value <%s>.', static::class, $json));
        }
    }

    public function isValidJson($string)
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
