<?php

namespace Src\People\Domain\Repository;

use Src\People\Domain\DTO\Peoples;

interface PeopleRepository
{
    public function getAll(): Peoples;
}