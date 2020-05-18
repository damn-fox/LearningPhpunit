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

use Acme\Money;

use PHPUnit\Framework\TestCase;

final class MoneyTest extends TestCase
{
    public function testCreateValidInstance(): void
    {
        $this->assertInstanceOf(
            Money::class,
            new Money(5)
        );
    }

    public function testInvalidNumber(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Money('ciao');
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Money(-5);
    }

    public function testMoneySize(): void
    {
        $money1 = new Money(8);
        $money2 = new Money(9);

        $this->assertTrue($money1 < $money2);
    }

    public function testCreateValidInstanceByAddingObjects(): void
    {
        $var = new Money(5);
        $this->assertEquals(new Money(11), $var->add(new Money(6)));
    }

    public function testCreateValidInstanceBySubtractingObjects(): void
    {
        $var = new Money(4);
        $this->assertEquals(new Money(2), $var->sub(new Money(2)));
    }
}
