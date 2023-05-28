<?php

declare(strict_types=1);

namespace Src\Shared\Domain\Exception;

use InvalidArgumentException;

class InvalidObjectInstanceException extends InvalidArgumentException
{
    private const ERROR_MESSAGE = 'The object <%s> is not an instance of <%s>';

    public function __construct(object $object, string $instance)
    {
        parent::__construct(
            sprintf(
                self::ERROR_MESSAGE,
                $instance,
                $object::class
            )
        );
    }
}
