<?php

namespace Src\People\Domain\ValueObject;


use Src\Department\Domain\Department;

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
}