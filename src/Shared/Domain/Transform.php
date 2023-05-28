<?php

declare(strict_types=1);

namespace Src\Shared\Domain;

use Src\Shared\Domain\Exception\InvalidObjectInstanceException;

interface Transform
{
    /**
     * @throws InvalidObjectInstanceException
     */
    public function toResponse(Entity $entity): array;
}
