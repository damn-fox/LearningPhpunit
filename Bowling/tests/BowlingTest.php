<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\Bowling;

use PHPUnit\Framework\TestCase;

final class BowlingTest extends TestCase
{
    private $g;

    public function setUp(): void
    {
        $this->g = new Bowling();
    }

    /**
     * @test
     */
    public function rollAllOnes()
    {
        $this->rollMany(20, 1);
        $this->assertEquals(20, $this->g->score());
    }

    /**
     * @test
     */
    public function RollOneSpare()
    {
        $this->g->roll(5);
        $this->g->roll(5);
        $this->g->roll(3);
        $this->rollMany(17, 0);
        $this->assertEquals(16, $this->g->score());
    }

    /**
     * @test
     **/
    public function RollPerfectGame()
    {
        $this->rollMany(12, 10);
        $this->assertEquals(300, $this->g->score());
    }

    public function rollMany($n, $pins)
    {
        for ($i = 0; $i < $n; $i++) {
            $this->g->roll($pins);
        }
    }
}
