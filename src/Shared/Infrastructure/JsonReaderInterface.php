<?php

namespace Src\Shared\Infrastructure;

interface JsonReaderInterface
{
    public function readJson(string $string): array;
}