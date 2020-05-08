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
        $this->assertEquals(Money::fromMoney(11),Money::addingObjects(5,6));
    }

    public function testCreateValidInstanceBySubtractingObjects(): void
    {
        $this->assertEquals(Money::fromMoney(2),Money::subtractingObjects(4,2));
    }


}


?>