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

final class Wardrobe
{
    private $result = [];
    private $minPrice = [];

    public function configureWardrobe()
    {
        $sizes = [59 => 50, 62 => 75, 90 => 100, 111 => 120];
        foreach ($sizes as $i) {
            foreach ($sizes as $j) {
                foreach ($sizes as $l) {
                    if (($i + $j + $l) === 250) {
                        $price = \array_search($i, $sizes) + \array_search($j, $sizes) + \array_search($l, $sizes);
                        \array_push($this->result, ['misura' => "$i,$j,$l", 'prezzo' => $price]);
                    }
                    foreach ($sizes as $k) {
                        if (($i + $j + $l + $k) === 250) {
                            $price = \array_search($i, $sizes) + \array_search($j, $sizes) + \array_search($l, $sizes) + \array_search($k, $sizes);
                            \array_push($this->result, ['misura' => "$i,$j,$l,$k", 'prezzo' => $price]);
                        }
                        foreach ($sizes as $m) {
                            if (($i + $j + $l + $k + $m) === 250) {
                                $price = \array_search($i, $sizes) + \array_search($j, $sizes) + \array_search($l, $sizes) + \array_search($k, $sizes) + \array_search($m, $sizes);
                                \array_push($this->result, ['misura' => "$i,$j,$l,$k,$m", 'prezzo' => $price]);
                            }
                        }
                    }
                }
            }
        }
    }

    public function getMinPrice()
    {
        foreach ($this->result as $singleArray) {
            $this->minPrice[] = $singleArray['prezzo'];
        }

        return \min($this->minPrice);
    }

    public function get()
    {
        return $this->result;
    }
} // end class logger
