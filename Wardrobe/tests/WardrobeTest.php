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

use Acme\Wardrobe;

use PHPUnit\Framework\TestCase;

final class WardrobeTest extends TestCase
{
    private $ward;

    public function setUp(): void
    {
        $this->ward = new Wardrobe();
    }

    /**
     * @test
     */
    public function countSolutions()
    {
        $this->ward->configureWardrobe();
        $this->assertEquals(17, \count($this->ward->get()));
    }

    /**
     * @test
     */
    public function minPrice()
    {
        $this->ward->configureWardrobe();
        $this->assertEquals(214, $this->ward->minPrice());
    }
}
