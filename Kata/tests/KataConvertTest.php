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
