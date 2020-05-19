<?php

/**
 * This file is part of `niccolo/learning-test`.
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
