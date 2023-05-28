<?php

namespace Src\People\Application\Query;

use Src\People\Domain\Entity\People;
use Src\People\Domain\Repository\PeopleRepository;

readonly class PeopleByDepartment
{
    public function __construct(
        public PeopleRepository $repository
    )
    {
    }

    public function execute(string $department): array
    {
        $response = [];

        /** @var People $person */
        foreach ($this->repository->getAll() as $person) {
            if(!$person->inDepartment($department)) {
                continue;
            }
            $response[] = $person->toArray();
        }

        return $response;
    }
}