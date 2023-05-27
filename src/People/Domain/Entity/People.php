<?php

namespace Src\People\Domain\Entity;

final readonly class People
{
    public const OLD = 40;

    public function __construct(
        public string $name,
        public string $surName,
        public ?int $age,
        public ?array $profession,
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
            'profession' => $this->profession,
            'sex' => $this->sex
        ];
    }
}