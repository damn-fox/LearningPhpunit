<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Wardrobe
{
    private $allCombinations = [];
    private $filteredCombinations = [];
    private $minPrice = [];
    private $sizes = [];
    private $sum = 0;

    public function __construct(array $sizes, int $sum)
    {
        $this->sizes = $sizes;
        $this->sum = $sum;

        $this->calculateAllCombinations();
    }

    public function calculateAllCombinations()
    {
        foreach ($this->sizes as $i) {
            foreach ($this->sizes as $j) {
                foreach ($this->sizes as $l) {
                    $this->add([$i, $j, $l]);
                    foreach ($this->sizes as $k) {
                        $this->add([$i, $j, $l, $k]);
                        foreach ($this->sizes as $m) {
                           $this->add([$i, $j, $l, $k, $m]);
                        }
                    }
                }
            }
        }
    }

    public function add($item):array
    {
        $this->allCombinations[]= $item;
        return $this->allCombinations;
    }

    public function getMinPrice()
    {
        foreach ($this->result as $singleArray) {
            $this->minPrice[] = $singleArray;
        }

        return \min($this->minPrice);
    }

    public function getAllCombinations()
    {
        return $this->allCombinations;
    }

    public function getFilteredCombinations()
    {
        foreach ($this->allCombinations as $item) {
            if (\array_sum($item) === $this->sum) {
                $this->filteredCombinations[] = $item;
            }
        }

        return $this->filteredCombinations;
    }
} // end class logger

//$ward = new Wardrobe([50,75,100,120],250);
//print_r($ward->getAllCombinations());
//print_r($ward->getFilteredCombinations());
