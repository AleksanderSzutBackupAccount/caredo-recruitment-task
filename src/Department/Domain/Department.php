<?php

declare(strict_types=1);

namespace Src\Department\Domain;

use Src\Shared\Domain\DepartmentType;

readonly class Department
{
    public function __construct(
        public DepartmentType $type
    ) {
    }

    public static function create(string $department): Department
    {
        return new self(
            DepartmentType::fromName($department)
        );
    }

    public function toString(): string
    {
        return $this->type->value;
    }
}
