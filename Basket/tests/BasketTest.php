<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\Basket;

use PHPUnit\Framework\TestCase;

final class BasketTest extends TestCase
{
    public function testAddPoints(): void
    {
        $game1 = new Basket();
        $game1->scoreTeamA3();
        $game1->scoreTeamA2();
        $game1->scoreTeamA1();
        $game1->scoreTeamB3();
        $game1->scoreTeamB3();

        $game2 = new Basket();
        $game2->scoreTeamA3();
        $game2->scoreTeamA3();
        $game2->scoreTeamA3();
        $game2->scoreTeamA3();

        $this->assertEquals('006:006', $game1->getScore());

        $this->assertEquals('012:000', $game2->getScore());
    }
}
