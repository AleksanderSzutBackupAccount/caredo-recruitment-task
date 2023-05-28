<?php

namespace Src\People\Application\Transform;

use Src\People\Domain\Entity\People;
use Src\Shared\Domain\Assert;
use Src\Shared\Domain\Entity;
use Src\Shared\Domain\Transform;

final class TransformPeople implements Transform
{
    public function __construct(public bool $isOld)
    {
    }

    public function toResponse(Entity|People $entity): array
    {
        Assert::instanceOf(People::class, $entity);
        /** @var People $entity */
        $array = [
            'name' => $entity->name,
            'surname' => $entity->surName,
            'sex' => $entity->sex,
            'profession' => $entity->profession->toArray(),
            'age' => $entity->age,
        ];

        if ($this->isOld) {
            $array['is_old'] = $entity->isOld();
        }

        return $array;
    }
}