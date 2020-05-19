<?php

/**
 * This file is part of `niccolo/learning-test`.
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
