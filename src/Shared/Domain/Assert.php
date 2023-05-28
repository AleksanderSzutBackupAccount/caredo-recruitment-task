<?php

declare(strict_types=1);

namespace Src\Shared\Domain;

use Src\Shared\Domain\Exception\InvalidObjectInstanceException;

final class Assert
{
    public static function arrayOf(string $class, array $items): void
    {
        foreach ($items as $item) {
            self::instanceOf($class, $item);
        }
    }

    public static function instanceOf(string $class, object $item): void
    {
        if (! $item instanceof $class) {
            throw new InvalidObjectInstanceException($item, $class);
        }
    }
}
