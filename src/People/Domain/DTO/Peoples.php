<?php

declare(strict_types=1);

namespace Src\People\Domain\DTO;

use Src\People\Domain\Entity\People;

class Peoples extends \Src\Shared\Domain\Collection
{
    protected function type(): string
    {
        return People::class;
    }
}
