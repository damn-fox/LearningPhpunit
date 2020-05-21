<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Position
{
    private $position;
    private $x;
    private $y;

    public function __construct(array $position)
    {
        $this->position = $position;
        $this->x = $position[0];
        $this->y = $position[1];
    }

    public function get(): array
    {
        return $this->position;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
} // end class Rover
