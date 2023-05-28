<?php

namespace Src\Department\Domain;

use Src\Shared\Domain\DepartmentType;

readonly class Department
{
    public function __construct(
        public DepartmentType $type
    ) {
    }

    static public function create(string $department): Department
    {
        return new self(
            DepartmentType::fromName($department)
        );
    }
}