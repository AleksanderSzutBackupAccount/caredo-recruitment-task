<?php

namespace Src\People\Domain\Entity;

final readonly class People
{
    public function __construct(
        public string $name,
        public string $surName,
        public int $age,
        public array $profession,
        public string $sex
    )
    {
    }
}