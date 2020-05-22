<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\Brackets;

use PHPUnit\Framework\TestCase;

final class BracketsTest extends TestCase
{
    /**
     * @test
     */
    public function createValidInstance(): void
    {
        $this->assertInstanceOf(
            Brackets::class,
            new Brackets('[][]')
        );
    }

    /**
     * @test
     */
    public function checkIsValidStringInsered()
    {
        $brackets = new Brackets('[][]');
        $this->assertTrue(true === $brackets->validateStringUser());
        $brackets2 = new Brackets('[][][');
        $this->assertTrue(false === $brackets2->validateStringUser());
        $brackets3 = new Brackets('[[[]]]');
        $this->assertTrue(true === $brackets3->validateStringUser());
    }
}
