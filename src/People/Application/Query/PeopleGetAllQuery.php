<?php

namespace Src\People\Application\Query;

use Src\People\Domain\Entity\People;
use Src\People\Domain\Repository\PeopleRepository;
use Src\Shared\Domain\Criteria\Filters;
use Src\Shared\Domain\Query;

final class PeopleGetAllQuery implements Query
{
    public function __construct(
        public PeopleRepository $repository
    )
    {
    }
    public function execute(Filters $filters): array
    {
        $response = [];

        /** @var People $person */
        foreach ($this->repository->getAll() as $person) {
            if (!$filters->filter($person)) {
                continue;
            }
            $response[] = $person->toArray();
        }

        return $response;
    }
}