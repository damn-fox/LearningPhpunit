<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\Destination;

use PHPUnit\Framework\TestCase;

final class DestinationTest extends TestCase
{
    /**
     * @test
     */
    public function getDestination()
    {
        $destination = new Destination('n', 'f');
        $this->assertEquals('n', $destination->getOrientation());
        $this->assertEquals('f', $destination->getDirection());
    }
}
