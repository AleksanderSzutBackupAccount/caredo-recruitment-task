<?php

declare(strict_types=1);

namespace Src\People\Application\Filter;

use Src\People\Domain\Entity\People;
use Src\Shared\Domain\Assert;
use Src\Shared\Domain\Criteria\FilterInterface;
use Src\Shared\Domain\DepartmentType;
use Src\Shared\Domain\Entity;

readonly class FilterByDepartment implements FilterInterface
{
    public function __construct(private DepartmentType $departmentType)
    {
    }

    public function filter(Entity $entity): bool
    {
        Assert::instanceOf(People::class, $entity);
        /** @var People $entity */

        return $entity->inDepartment($this->departmentType);
    }
}
