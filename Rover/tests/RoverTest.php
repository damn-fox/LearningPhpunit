<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\Destination;
use Acme\Position;
use Acme\Rover;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    /**
     * @test
     */
    public function createValidInstance(): void
    {
        $this->assertInstanceOf(
            Rover::class,
            new Rover(new Position([2, 5]))
        );
    }

    /**
     * @test
     */
    public function moveRover()
    {
        $rover = new Rover(new Position([2, 5]));
        $rover->move(new Destination('n', 'f'));
        $rover->move(new Destination('n', 'f'));
        $rover->move(new Destination('n', 'f'));
        $this->assertEquals(2, $rover->getFinalPosition()[0]);
        $this->assertEquals(8, $rover->getFinalPosition()[1]);

        $rover2 = new Rover(new Position([0, 3]));
        $rover2->move(new Destination('n', 'r'));
        $rover2->move(new Destination('n', 'r'));
        $rover2->move(new Destination('n', 'f'));
        $this->assertEquals(2, $rover2->getFinalPosition()[0]);
        $this->assertEquals(4, $rover2->getFinalPosition()[1]);

        $rover3 = new Rover(new Position([0, 0]));
        $rover3->move(new Destination('s', 'r'));
        $rover3->move(new Destination('s', 'r'));
        $rover3->move(new Destination('s', 'f'));
        $this->assertEquals(-2, $rover3->getFinalPosition()[0]);
        $this->assertEquals(-1, $rover3->getFinalPosition()[1]);

        $rover = new Rover(new Position([1, 5]));
        $rover->move(new Destination('e', 'f'));
        $rover->move(new Destination('e', 'f'));
        $rover->move(new Destination('e', 'f'));
        $this->assertEquals(4, $rover->getFinalPosition()[0]);
        $this->assertEquals(5, $rover->getFinalPosition()[1]);
    }
}
