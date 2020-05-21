<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Lift
{
    private $currentFloor;
    private $floorsVisited;
    private $passengers;

    public function __construct()
    {
        $this->currentFloor = 0;
        $this->floorsVisited = [$this->currentFloor];
        $this->passengers = [];
    }

    public function getCurrentFloor(): int
    {
        return $this->currentFloor;
    }

    public function moveTo(int $currentFloor)
    {
        $this->currentFloor = $currentFloor;
        $this->floorsVisited[] = $currentFloor;
    }

    public function addPassenger(Person $person)
    {
        $this->passengers[] = $person;
    }

    public function removePassenger(Person $person)
    {
        $position = \array_search($person, $this->passengers, true);

        unset($this->passengers[$position]);

        $person->setCurrentFloor($this->getCurrentFloor());
    }

    public function getPassengers(): array
    {
        return $this->passengers;
    }

    public function getNumberOfPassengers(): int
    {
        return \count($this->passengers);
    }
}
