<?php

declare(strict_types=1);

namespace Acme;

final class Bowling
{
    private $rolls = array();

    public function roll($pins)
    {
        $this->rolls[] = $pins;
    }

    public function score()
    {
        $score = 0;
        $rollsMax = count($this->rolls);
        $game = 0;

        for ($frame = 0; $frame < 10; $frame++) {
            if ($this->rolls[$game] == 10) {
                $score += 10 + $this->nextTwoBallsForStrike($game);
                $game++;
            } else if ($this->rolls[$game] + $this->rolls[$game + 1] == 10) {
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
