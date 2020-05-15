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

final class Logger
{
    public function __construct(LoggerAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function log(string $userString): void
    {
        if ($userString === '') {
            return;
        }

        $this->adapter->log($userString);
    }

    public function get(): array
    {
        return $this->adapter->get();
    }
} // end class logger
