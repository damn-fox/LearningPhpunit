<?php

/**
 * This file is part of `niccolo/learning-test`.
 * (c) 2016-2020 prooph software GmbH <contact@prooph.de>
 * (c) 2016-2020 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
        $position = array_search($person, $this->passengers, true);

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
