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

require 'vendor/autoload.php';

use Acme\Lift;
use Acme\Person;
use PHPUnit\Framework\TestCase;

final class LiftTest extends TestCase
{
    private $lift;

    public function setUp(): void
    {
        $this->lift = new Lift();
    }

    public function testNumberOfPassengersInLiftIsCorrect()
    {
        $passenger1 = new Person('Test', 0, 6);
        $passenger2 = new Person('Test', 0, 4);
        $passenger3 = new Person('Test', 0, 2);

        $this->lift->addPassenger($passenger1);
        $this->lift->addPassenger($passenger2);
        $this->lift->addPassenger($passenger3);

        $this->lift->removePassenger($passenger3);

        $this->assertEquals(2, $this->lift->getNumberOfPassengers());
    }
}
