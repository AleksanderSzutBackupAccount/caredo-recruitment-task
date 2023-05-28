<?php

namespace Tests\Unit\Shared\Fake;

use Src\Shared\Domain\Collection;

class FakeCollection extends Collection
{
    protected function type(): string
    {
        return FakeEntity::class;
    }
}