<?php declare(strict_types=1);
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
        $this->expectException(InvalidArgumentException::class);

        Money::fromMoney("ciao");
    }

    public function testNegativeNumber(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Money::fromMoney(-5);
    }

}


?>