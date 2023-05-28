<?php

declare(strict_types=1);

namespace Tests\Unit\Shared;

use ArrayIterator;
use Exception;
use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Exception\InvalidObjectInstanceException;
use stdClass;
use Tests\Unit\Shared\Fake\FakeCollection;
use Tests\Unit\Shared\Fake\FakeEntity;

class CollectionTest extends TestCase
{
    public function test_creating_collection_should_throw_exception_with_invalid_entity(): void
    {
        $this->expectException(InvalidObjectInstanceException::class);

        new FakeCollection([new stdClass]);
    }

    public function test_count(): void
    {
        $this->assertTrue(1 === $this->getCollection()->count());
    }

    /**
     * @throws Exception
     */
    public function test_iterator(): void
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
