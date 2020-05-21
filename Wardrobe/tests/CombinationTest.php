<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

use Acme\Combination;

use PHPUnit\Framework\TestCase;

final class CombinationTest extends TestCase
{
    private $combination;

    public function setUp(): void
    {
        $this->combination = new Combination();
    }

    /**
     * @test
     */
    public function addItem()
    {
        $this->combination->add(['ciao']);
        $this->combination->add(['amica']);
        $this->assertEquals(['ciao'], $this->combination->get()[0]);
        $this->assertEquals(['amica'], $this->combination->get()[1]);
    }
}
