<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

interface GreetingAdapter
{
    public function greet($userTyping): string;

    public function get(): string;
} // end interface
