<?php

namespace Tests\Unit\Shared;

use ArrayIterator;
use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exception\InvalidObjectInstanceException;
use stdClass;
use Tests\Unit\Shared\Fake\FakeCollection;
use Tests\Unit\Shared\Fake\FakeEntity;

class CollectionTest extends TestCase
{

    public function
    test_creating_collection_should_throw_exception_with_invalid_entity
    ()
    {
        $this->expectException(InvalidObjectInstanceException::class);

        new FakeCollection([new stdClass()]);
    }

    public function test_count()
    {
        $this->assertTrue($this->getCollection()->count() === 1);
    }

    public function test_iterator()
    {
        $entities = [new FakeEntity];

        $collections = new FakeCollection($entities);
        $iterator = $collections->getIterator();

        $this->assertEquals($iterator, new ArrayIterator($entities));
    }

    private function getCollection(): FakeCollection
    {
        $entities = [new FakeEntity];

        return new FakeCollection($entities);
    }
}