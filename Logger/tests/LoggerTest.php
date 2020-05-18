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

use Acme\DummyAdapter;
use Acme\Logger;

use PHPUnit\Framework\TestCase;

final class LoggerTest extends TestCase
{
    private $loggerDummy;

    public function setUp(): void
    {
        $this->loggerDummy = new Logger(new DummyAdapter());
    }

    /**
     * @test
     */
    public function createValidInstance()
    {
        $this->assertInstanceOf(
            Logger::class,
            new Logger(new DummyAdapter())
        );
    }

    /**
     * @test
     */
    public function arrayLenght()
    {
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('ciao');
        $this->assertEquals(3, \count($this->loggerDummy->get()));
    }

    /**
     * @test
     */
    public function arrayHoldsTheValue()
    {
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('Sono una stringa');
        $this->loggerDummy->log('');
        $this->assertEquals('Sono una stringa', $this->loggerDummy->get()[2]);
    }

    /**
     * @test
     */
    public function arrayDoesntHoldsTheValue()
    {
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('ciao');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('Sono una stringa');
        $this->loggerDummy->log('');
        $this->assertNotEquals('Sono unastringa', $this->loggerDummy->get()[2]);
    }

    /**
     * @test
     */
    public function enterAllEmptyStrings()
    {
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->loggerDummy->log('');
        $this->assertEquals(0, \count($this->loggerDummy->get()));
    }
}
