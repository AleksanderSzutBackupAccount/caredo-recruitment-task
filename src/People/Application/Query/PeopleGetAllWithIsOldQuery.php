<?php

namespace Src\People\Application\Query;

use Src\People\Domain\Entity\People;
use Src\People\Domain\Repository\PeopleRepository;

readonly class PeopleGetAllWithIsOldQuery
{
    public function __construct(
        public PeopleRepository $repository
    )
    {
    }

    public function execute(): array
    {
        $response = [];

        /** @var People $person */
        foreach ($this->repository->getAll() as $person) {
            $result = $person->toArray();
            $result['is_old'] = $person->isOld();
            $response[] = $result;
        }

        return $response;
    }
}