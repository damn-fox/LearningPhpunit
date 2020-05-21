<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Wardrobe
{
    private $filteredCombinations = [];
    private $minPrice = [];
    private $sizes = [];
    private $sum = 0;
    private $combinations;

    public function __construct(array $sizes, int $sum)
    {
        $this->combinations = new Combination();
        $this->sizes = $sizes;
        $this->sum = $sum;
        $this->calculateAllCombinations();
    }

    public function calculateAllCombinations(): void
    {
        foreach ($this->sizes as $i) {
            foreach ($this->sizes as $j) {
                foreach ($this->sizes as $l) {
                    $this->combinations->add([$i, $j, $l]);
                    foreach ($this->sizes as $k) {
                        $this->combinations->add([$i, $j, $l, $k]);
                        foreach ($this->sizes as $m) {
                            $this->combinations->add([$i, $j, $l, $k, $m]);
                        }
                    }
                }
            }
        }
    }

    public function getAllCombinations(): array
    {
        return $this->combinations->get();
    }

    public function getFilteredCombinations(): array
    {
        foreach ($this->combinations->get() as $item) {
            if (\array_sum($item) === $this->sum) {
                $this->filteredCombinations[] = $item;
            }
        }

        return $this->filteredCombinations;
    }
} // end class logger
//echo 'ciao';
//$ward = new Wardrobe([50,75,100,120],250);
//print_r($ward->getAllCombinations());
