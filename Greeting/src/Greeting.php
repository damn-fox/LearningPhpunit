<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Greeting
{
    public function __construct(GreetingAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function greet($userTyping): void
    {
        $this->adapter->greet($userTyping);
    }

    public function get(): string
    {
        return $this->adapter->get();
    }
}// end of class
