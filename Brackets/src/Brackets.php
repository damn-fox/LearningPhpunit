<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Brackets
{
    private $userString;

    public function __construct(string $userString = '')
    {
        $this->userString = \str_split($userString);
    }

    public function validateStringUser(): Bool
    {
        $occurrences = \array_count_values($this->userString);
        if ($this->userString[0] === '[' && $this->userString[\count($this->userString) - 1] === ']' && ($occurrences['['] === $occurrences[']'])) {
            return true;
        }

        return false;
    }

    public function get(): array
    {
        return $this->userString;
    }
} // end class Brackets

/*
$brackets = new Brackets('[][]');
print_r(array_count_values($brackets->get()));
*/
