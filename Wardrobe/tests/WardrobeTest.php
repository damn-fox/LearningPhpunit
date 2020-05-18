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

use Acme\Wardrobe;

use PHPUnit\Framework\TestCase;

final class WardrobeTest extends TestCase
{
    private $ward;

    public function setUp(): void
    {
        $this->ward = new Wardrobe([50, 75, 100, 120], 250);
    }

    /**
     * @test
     */
    public function countItem()
    {
        $this->assertEquals(1344, \count($this->ward->getAllCombinations()));
    }

    /**
     * @test
     */
    public function addItem()
    {
        $array = ['banana', 'ananas', 'pera'];
        $array = $this->ward->add($array, 'arancia');
        $this->assertEquals('arancia', $array[3]);
    }

    /**
     * @test
     */
    public function countFilteredItem()
    {
        $this->assertEquals(17, \count($this->ward->getFilteredCombinations()));
    }
}
