<?php

namespace Src\People\Domain\Hydration;

use Src\Department\Domain\Department;
use Src\People\Domain\ValueObject\PeopleProfession;

class ProfessionHydration
{
    public static function toArray(array|string|null $data): array {
        if(gettype($data) !== 'array')
        {
            return [$data];
        }
        return $data;
    }
    public static function hydrate(array|string|null $data): PeopleProfession {
        if($data === null) {
            return new PeopleProfession([]);
        }
        $departments = [];

        foreach (self::toArray($data) as $professionName) {
            $departments[] = Department::create($professionName);
        }

        return new PeopleProfession($departments);
    }

}