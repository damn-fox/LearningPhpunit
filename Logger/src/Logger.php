<?php

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
