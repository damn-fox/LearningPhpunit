<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Combination
{
    private $combinations = [];

    public function add(array $item): void
    {
        $this->combinations[] = $item;
    }

    public function get(): array
    {
        return $this->combinations;
    }
}
