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
