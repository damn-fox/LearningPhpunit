<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\Position;

use PHPUnit\Framework\TestCase;

final class PositionTest extends TestCase
{
    /**
     * @test
     */
    public function getPosition()
    {
        $position = new Position([2, 4]);
        $this->assertEquals([2, 4], $position->get());
    }
}
