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

    /**
     * @test
     */
    public function invalidDirection(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Destination('n', 'franco');
    }

    /**
     * @test
     */
    public function invalidOrientation(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Destination('ciccio', 'f');
    }
}
