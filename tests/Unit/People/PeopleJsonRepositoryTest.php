<?php

declare(strict_types=1);

namespace Tests\Unit\People;

use PHPUnit\Framework\TestCase;
use Src\People\Infrastructure\Persistence\Repository\PeopleJsonRepository;

class PeopleJsonRepositoryTest extends TestCase
{
    public function test(): void
    {
        $repository = new PeopleJsonRepository;

        $peoples = $repository->getAll();

        $this->assertEquals(12, $peoples->count());
    }
}
