<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Destination
{
    private $orientation;
    private $direction;
    private $xDestination;
    private $yDestination;

    public function __construct(string $orientation,string $direction)
    {
        $this->orientation = $orientation;
        $this->direction = $direction;
    }

    public function getOrientation():string
    {
        return $this->orientation;
    }

    public function getDirection():string
    {
        return $this->direction;
    }

    public function getX():int
    {
        return $this->xDestination;
    }

    public function getY():int
    {
        return $this->yDestination;
    }
} // end class Rover
