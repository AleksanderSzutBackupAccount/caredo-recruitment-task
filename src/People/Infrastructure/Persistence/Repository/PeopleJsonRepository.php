<?php

namespace Src\People\Infrastructure\Persistence\Repository;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Src\People\Domain\DTO\Peoples;
use Src\People\Domain\Entity\People;
use Src\People\Domain\Repository\PeopleRepository;

class PeopleJsonRepository implements PeopleRepository
{
    private const DATA_SRC = __DIR__.'/../Data/People.json';
    public function getAll(): Peoples
    {
        $json = file_get_contents(self::DATA_SRC);

        $array = json_decode($json, true);

        $peoplesJson = $array['people'];

        $peoples = [];

        foreach($peoplesJson as $peopleJson) {
            if(gettype($peopleJson['profession']) === 'string')
            {
                $peopleJson['profession'] = [$peopleJson['profession']];
            }

            $peoples[] = new People(
                $peopleJson['name'],
                $peopleJson['surname'],
                $peopleJson['age'],
                $peopleJson['profession'],
                $peopleJson['sex'],
            );
        }

        return new Peoples($peoples);
    }
}