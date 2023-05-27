<?php

namespace Tests\Unit\People;

use PHPUnit\Framework\TestCase;
use Src\People\Infrastructure\Persistence\Repository\PeopleJsonRepository;

class PeopleJsonRepositoryTest extends TestCase
{
    public function test() {
        $repository = new PeopleJsonRepository();
        $repository->getAll();
    }
}
