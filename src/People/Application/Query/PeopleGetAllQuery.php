<?php

namespace Src\People\Application\Query;

use Src\Shared\Domain\Query;

final class PeopleGetAllQuery implements Query
{
    public function execute(): array {
        return [];
    }
}