<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

class StringAdapter implements GreetingAdapter
{
    private $stringGreet;

    public function __construct(string $userString)
    {
        $this->stringGreet = $this->greet($userString);
    }

    public function greet($name): string
    {
        return $this->greetName($name);
    }

    private function greetName(string $name): string
    {
        if ($name === '') {
            return 'Hello, my friend';
        }
        if ($name === \strtoupper($name)) {
            return "HELLO $name";
        }

        return "Hello, $name";
    }

    public function get(): string
    {
        return $this->stringGreet;
    }
} // end class fileadapter implements interface
