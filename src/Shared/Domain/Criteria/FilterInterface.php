<?php

declare(strict_types=1);

namespace Src\Shared\Domain\Criteria;

use Src\Shared\Domain\Entity;
use Src\Shared\Domain\Exception\InvalidObjectInstanceException;

interface FilterInterface
{
    /**
     * @throws InvalidObjectInstanceException
     */
    public function filter(Entity $entity): bool;
}
