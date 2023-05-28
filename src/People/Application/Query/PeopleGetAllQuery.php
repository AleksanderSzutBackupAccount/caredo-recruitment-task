<?php

declare(strict_types=1);

namespace Src\People\Application\Query;

use Src\People\Domain\Entity\People;
use Src\People\Domain\Repository\PeopleRepository;
use Src\Shared\Domain\Criteria\Filters;
use Src\Shared\Domain\Query;
use Src\Shared\Domain\Transform;

final class PeopleGetAllQuery implements Query
{
    public function __construct(
        public PeopleRepository $repository
    ) {
    }

    public function execute(Filters $filters, Transform $transform): array
    {
        $response = [];

        /** @var People $person */
        foreach ($this->repository->getAll() as $person) {
            if (! $filters->filter($person)) {
                continue;
            }

            $response[] = $transform->toResponse($person);
        }

        return $response;
    }
}
