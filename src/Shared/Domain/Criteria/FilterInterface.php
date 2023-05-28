<?php

namespace Src\Shared\Domain\Criteria;

use Src\Shared\Domain\Entity;
use Src\Shared\Domain\Exception\InvalidObjectInstanceException;

interface FilterInterface
{
    /**
     * @param  Entity  $entity
     * @return bool
     * @throws InvalidObjectInstanceException
     */
    public function filter(Entity $entity): bool;
}