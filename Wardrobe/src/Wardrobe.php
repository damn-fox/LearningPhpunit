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

    public function __construct()
    {
        $sizes = [50, 75, 100, 120];
        foreach ($sizes as $i) {
            foreach ($sizes as $j) {
                if (($i + $j) === 250) {
                    $this->result[] = "$i+$j";
                }
                foreach ($sizes as $l) {
                    if (($i + $j + $l) === 250) {
                        $this->result[] = "$i+$j+$l";
                    }
                    foreach ($sizes as $k) {
                        if (($i + $j + $l + $k) === 250) {
                            $this->result[] = "$i+$j+$l+$k";
                        }
                    }
                }
            }
        }
    }

    public function get()
    {
        return $this->result;
    }
} // end class logger
