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

class FileAdapter implements LoggerAdapter
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if (! \file_exists($this->filePath)) {
            $fp = \fopen($this->filePath, 'w');
            \fclose($fp);
        }
    }

    public function log(string $userString): void
    {
        \file_put_contents($this->filePath, $userString . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public function get(): array
    {
        $message = [];

        $fn = \file($this->filePath);
        foreach ($fn as $line) {
            $message[] = $line;
        }

        return $message;
    }
} // end class fileadapter implements interface
