<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Destination
{
    private $allOrientations = ['n', 's', 'e', 'w'];
    private $allDirections = ['f', 'b', 'r', 'l'];
    private $orientation;
    private $direction;

    /*
    private $north = "n";
    private $south = "s";
    private $east = "e";
    private $west = "w";
    private $forward = "f";
    private $backward = "b";
    private $right = "r";
    private $left = "l";
    */

    public function __construct(string $orientation, string $direction)
    {
        if (! \in_array($orientation, $this->allOrientations)) {
            throw new \InvalidArgumentException(\sprintf('"%s" is not a valid orientation.', $orientation));
        }

        $this->orientation = $orientation;

        if (! \in_array($direction, $this->allDirections)) {
            throw new \InvalidArgumentException(\sprintf('"%s" is not a valid direction.', $direction));
        }

        $this->direction = $direction;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
} // end class Rover
