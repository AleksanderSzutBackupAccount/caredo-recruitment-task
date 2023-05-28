<?php

declare(strict_types=1);

namespace Src\People\Domain\Hydration;

use Src\Department\Domain\Department;
use Src\People\Domain\ValueObject\PeopleProfession;

class ProfessionHydration
{
    public static function toArray(array|string|null $data): array
    {
        if ('array' !== gettype($data)) {
            return [$data];
        }

        return $data;
    }

    public static function hydrate(array|string|null $data): PeopleProfession
    {
        if (null === $data) {
            return new PeopleProfession([]);
        }
        $departments = [];

        foreach (self::toArray($data) as $professionName) {
            $departments[] = Department::create($professionName);
        }

        return new PeopleProfession($departments);
    }
}
