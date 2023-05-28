<?php

declare(strict_types=1);

namespace Tests\Unit\Shared;

use PHPUnit\Framework\TestCase;
use Src\Shared\Domain\Assert;
use Src\Shared\Domain\Exception\InvalidObjectInstanceException;
use stdClass;

class AssertTest extends TestCase
{
    public function test_instance_of_throw_error(): void
    {
        $object1 = new stdClass;
        $object2 = new class
        {
        };
        $this->expectException(InvalidObjectInstanceException::class);

        Assert::instanceOf($object1::class, $object2);
    }

    public function test_instance_of_not_throw_error(): void
    {
        $object1 = new stdClass;

        Assert::instanceOf($object1::class, $object1);

        $this->assertTrue(true);
    }
}
