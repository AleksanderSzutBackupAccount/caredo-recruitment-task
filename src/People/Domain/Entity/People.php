<?php

namespace Src\People\Domain\Entity;

use Src\People\Domain\ValueObject\PeopleProfession;
use Src\Shared\Domain\DepartmentType;

final readonly class People
{
    public const OLD = 40;

    public function __construct(
        public string $name,
        public string $surName,
        public ?int $age,
        public PeopleProfession $profession,
        public string $sex
    ) {
    }

    public function isOld(): bool
    {
        return $this->age > self::OLD;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'surName' => $this->surName,
            'age' => $this->age,
            'profession' => $this->profession->toArray(),
            'sex' => $this->sex
        ];
    }

    public function isSex(string $sex): bool
    {
        return strtolower($sex) === strtolower($this->sex);
    }
    public function inDepartment(string $department): bool
    {
        return $this->profession->inDepartment(DepartmentType::fromName($department));
    }
}