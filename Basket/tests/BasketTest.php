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
