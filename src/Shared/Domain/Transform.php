<?php

namespace Src\Shared\Domain;

use Src\Shared\Domain\Exception\InvalidObjectInstanceException;

interface Transform
{

    /**
     * @param  Entity  $entity
     * @return array
     * @throws InvalidObjectInstanceException
     */
    public function toResponse(Entity $entity): array;
}