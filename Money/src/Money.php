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

namespace Acme;

final class Money
{
    private $money;

    public function __construct($money)
    {
        $this->ensureIsValidNumber($money);

        $this->money = $money;
    }

    private function ensureIsValidNumber($money): void
    {
        if (! \is_int($money)) {
            throw new \InvalidArgumentException(\sprintf('"%s" is not a valid money object', $money));
        }

        if ($money < 0) {
            throw new \InvalidArgumentException(\sprintf('"%s" cannot be negative', $money));
        }
    }

    public function getValue()
    {
        return $this->money;
    }

    public function add(Money $money1)
    {
        return new Money($this->money + $money1->money);
    }

    public function sub(Money $money1)
    {
        return new Money($this->money - $money1->money);
    }
}
