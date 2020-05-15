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

final class Basket
{
    private $scoreA = 0;
    private $scoreB = 0;

    public function scoreTeamA1(): void
    {
        $this->scoreA += 1;
    }

    public function scoreTeamA2(): void
    {
        $this->scoreA += 2;
    }

    public function scoreTeamA3(): void
    {
        $this->scoreA += 3;
    }

    public function scoreTeamB1(): void
    {
        $this->scoreB += 1;
    }

    public function scoreTeamB2(): void
    {
        $this->scoreB += 2;
    }

    public function scoreTeamB3(): void
    {
        $this->scoreB += 3;
    }

    public function getScoreA()
    {
        return $this->scoreA;
    }

    public function getScoreB()
    {
        return $this->scoreB;
    }

    public function getScore(): string
    {
        $teamA = '';
        $teamB = '';
        $result = '';

        if ($this->scoreA < 10) {
            $teamA = '00';
            $teamA .= (string) $this->scoreA;
        }

        if ($this->scoreB < 10) {
            $teamB = '00';
            $teamB .= (string) $this->scoreB;
        }
        if ($this->scoreA >= 10 && $this->scoreA < 100) {
            $teamA = '0';
            $teamA .= (string) $this->scoreA;
        }

        if ($this->scoreB >= 10 && $this->scoreB < 100) {
            $teamB = '00';
            $teamB .= (string) $this->scoreB;
        }

        if ($this->scoreA >= 100) {
            $teamA = (string) $this->scoreA;
        }

        if ($this->scoreB >= 100) {
            $teamB = (string) $this->scoreB;
        }

        $result = $teamA;
        $result .= ':';
        $result .= $teamB;

        return $result;
    }
}
