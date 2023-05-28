<?php

declare(strict_types=1);

namespace Src\People\Infrastructure\Persistence\Repository;

use Src\People\Domain\DTO\Peoples;
use Src\People\Domain\Entity\People;
use Src\People\Domain\Hydration\ProfessionHydration;
use Src\People\Domain\Repository\PeopleRepository;

class PeopleJsonRepository implements PeopleRepository
{
    private const FILE_PATH = __DIR__.'/../Data/People.json';

    public function getAll(): Peoples
    {
        $peoplesJson = $this->readJson();

        $peoples = [];

        //todo: add People hydration from array
        foreach ($peoplesJson as $peopleJson) {
            $peoples[] = new People(
                $peopleJson['name'],
                $peopleJson['surname'],
                $peopleJson['age'],
                ProfessionHydration::hydrate($peopleJson['profession']),
                $peopleJson['sex'],
            );
        }

        return new Peoples($peoples);
    }

    public function readJson(): array
    {
        $json = file_get_contents(self::FILE_PATH);

        $array = json_decode($json, true);

        return $array['people'];
    }
}
