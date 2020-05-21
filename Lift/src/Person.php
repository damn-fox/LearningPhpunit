<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Person
{
    private $name;
    private $currentFloor;
    private $destination;

    public function __construct($name, $currentFloor, $destination)
    {
        $this->name = $name;
        $this->currentFloor = $currentFloor;
        $this->destination = $destination;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCurrentFloor()
    {
        return $this->currentFloor;
    }

    public function setCurrentFloor($currentFloor)
    {
        $this->currentFloor = $currentFloor;
    }

    public function getDestination()
    {
        return $this->destination;
    }
}
