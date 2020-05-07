<?php declare(strict_types=1);

namespace Acme\Money;

use PHPUnit\Framework\TestCase;


final class MoneyTest extends TestCase
{
    public function testCreateValidInstance(): void
    {
        $this->assertInstanceOf(
            Money::class,
            Money::fromMoney(5)
        );
    }

    public function testInvalidNumber(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Money::fromMoney("ciao");
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Money::fromMoney(-5);
    }

    public function testMoneySize(): void
    {
        $money1 = Money::fromMoney(8);
        $money2 = Money::fromMoney(9);

        $this->assertTrue($money1<$money2);
    }

    public function testCreateValidInstanceByAddingObjects(): void
    {
        $money1 = Money::fromMoney(5);
        $money2 = Money::fromMoney(6);

        $this->assertInstanceOf(
            Money::class,
            Money::fromMoney($money1->getMoneyValue() + $money2->getMoneyValue())
        );
    }

    public function testCreateValidInstanceBySubtractingObjects(): void
    {
        $money1 = Money::fromMoney(7);
        $money2 = Money::fromMoney(6);

        $this->assertInstanceOf(
            Money::class,
            Money::fromMoney($money1->getMoneyValue() - $money2->getMoneyValue())
        );
    }

}


?>