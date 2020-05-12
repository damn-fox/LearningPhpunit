<?php declare(strict_types=1);

require "vendor/autoload.php";

use Acme\Basket;

use PHPUnit\Framework\TestCase;

final class BasketTest extends TestCase
{
    public function testCreateValidInstance(): void
    {
        $this->assertInstanceOf(
            Basket::class,
            new Basket()
        );
    }
}