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

class DummyAdapter implements LoggerAdapter
{
    private $message = [];

    public function log(string $userString): void
    {
        $this->message[] = $userString;
    }

    public function get(): array
    {
        return $this->message;
    }
}
