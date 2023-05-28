<?php

namespace Src\Shared\Domain\Criteria;


use Src\Shared\Domain\Collection;
use Src\Shared\Domain\Entity;

final class Filters extends Collection
{
    public function add(FilterInterface $filter): self
    {
        return new self(array_merge($this->items, [$filter]));
    }

    public function filter(Entity $entity): bool
    {
        /** @var FilterInterface $filter */
        foreach ($this->items as $filter) {
            if (!$filter->filter($entity)) {
                return false;
            }
        }
        return true;
    }

    protected function type(): string
    {
        return FilterInterface::class;
    }
}