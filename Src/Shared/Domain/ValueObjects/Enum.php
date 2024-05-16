<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

use Src\Shared\Domain\Exceptions\InvalidValueObjectException;

abstract class Enum
{
    protected static $cache = [];
    protected $value;

    public function __construct($value)
    {
        $this->ensureIsBetweenAcceptedValues($value);
        $this->value = $value;
    }

    public static function __callStatic(string $name, $args)
    {
        return new static(self::values()[$name]);
    }

    public static function values(): array
    {
        $class = static::class;

        if (!isset(self::$cache[$class])) {
            $reflected = new \ReflectionClass($class);
            self::$cache[$class] = self::reindex(self::keysFormatter(), $reflected->getConstants());
        }

        return self::$cache[$class];
    }

    public static function randomValue()
    {
        return self::values()[array_rand(self::values())];
    }

    public static function random()
    {
        return new static(self::randomValue());
    }

    private static function keysFormatter(): callable
    {
        return static function ($unused, $key): string {
            return self::toCamelCase(strtolower($key));
        };
    }

    private static function toCamelCase(string $text): string
    {
        return lcfirst(str_replace('_', '', ucwords($text, '_')));
    }

    public function value()
    {
        return $this->value;
    }

    public function equals(Enum $other): bool
    {
        return $other == $this;
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    private function ensureIsBetweenAcceptedValues($value): void
    {
        if (!\in_array($value, static::values(), true)) {
            $this->throwExceptionForInvalidValue($value);
        }
    }

    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidValueObjectException(sprintf('<%s>Invalid value: <%s>', static::class, $value));
    }

    private static function reindex(callable $fn, iterable $coll): array
    {
        $result = [];

        foreach ($coll as $key => $value) {
            $result[$fn($value, $key)] = $value;
        }

        return $result;
    }
}
