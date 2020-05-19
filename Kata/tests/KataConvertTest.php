<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\KataConvert;

use PHPUnit\Framework\TestCase;

final class KataConvertTest extends TestCase
{
    public function testCreateValidInstance(): void
    {
        $this->assertInstanceOf(
            KataConvert::class,
            new KataConvert(5)
        );
    }

    public function testIntegerConvertedToRoman(): void
    {
        $var = new KataConvert(4);
        $this->assertEquals('IV', $var->convertToRoman());
        $var2 = new KataConvert(10);
        $this->assertEquals('X', $var2->convertToRoman());
        $var3 = new KataConvert(3452);
        $this->assertEquals('MMMCDLII', $var3->convertToRoman());
        $var4 = new KataConvert(50);
        $this->assertEquals('L', $var4->convertToRoman());
        $var5 = new KataConvert(1658);
        $this->assertEquals('MDCLVIII', $var5->convertToRoman());
    }
}
