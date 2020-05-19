<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

interface LoggerAdapter
{
    public function log(string $userString): void;

    public function get(): array;
} // end interface
