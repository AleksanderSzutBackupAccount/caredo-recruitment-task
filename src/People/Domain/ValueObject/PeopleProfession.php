<?php

namespace Src\People\Domain\ValueObject;


use Src\Department\Domain\Department;
use Src\Shared\Domain\DepartmentType;

class PeopleProfession extends \Src\Shared\Domain\Collection
{
    protected function type(): string
    {
        return Department::class;
    }
    
    public function toArray(): array {
        $result = [];
        /** @var Department $item */
        foreach ($this->items as $item) {
            $result[] = $item->toString();
        }
        
        return $result;
    }

    public function inDepartment(DepartmentType $type): bool
    {
        return in_array($type->value, $this->toArray(), true);
    }
}