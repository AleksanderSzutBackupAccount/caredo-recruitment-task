<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure;

interface JsonReaderInterface
{
    public function readJson(string $string): array;
}
