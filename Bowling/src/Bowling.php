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

final class Bowling
{
    private $rolls = [];

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $rollsMax = \count($this->rolls);
        $game = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$game] === 10) {
                $score += 10 + $this->nextTwoBallsForStrike($game);
                $game++;
            } elseif ($this->rolls[$game] + $this->rolls[$game + 1] === 10) {
                $score += 10 + $this->nextBallForSpare($game);
                $game += 2;
            } else {
                $score += $this->twoBallsInFrame($game);
                $game += 2;
            }
        }

        return $score;
    }

    public function nextTwoBallsForStrike($game)
    {
        return $this->rolls[$game + 1] + $this->rolls[$game + 2];
    }

    public function nextBallForSpare($game)
    {
        return $this->rolls[$game + 2];
    }

    public function twoBallsInFrame($game)
    {
        return $this->rolls[$game] + $this->rolls[$game + 1];
    }
}
