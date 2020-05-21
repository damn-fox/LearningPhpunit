<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\Rover;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    private $rover;

    public function setUp(): void
    {
        $this->rover = new Rover();
    }
}
