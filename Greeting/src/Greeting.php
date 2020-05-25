<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Greeting
{
    public function greeting($userTyping)
    {
        if (\is_string($userTyping)) {
            return $this->greet($userTyping);
        }

        if (\is_array($userTyping)) {
            if (\count($userTyping) > 2) {
                if ($userTyping[0] === \strtoupper($userTyping[0]) || $userTyping[1] === \strtoupper($userTyping[1])) {
                    return $this->greetMixed($userTyping);
                }

                return $this->greetAll($userTyping);
            }
            if (\count($userTyping) === 2) {
                if (\strpos($userTyping[1], '"') !== false || \strpos($userTyping[1], ',') !== false) {
                    if (\strpos(\explode(',', $userTyping[1])[0], '"') !== false) {
                        return $this->greetEscapingIntentionalCommas($userTyping);
                    }

                    return $this->greetNamesContainingComma($userTyping);
                }

                return $this->greetMany($userTyping);
            }
        }
    }

    public function greet(string $name): string
    {
        if ($name === '') {
            return 'Hello, my friend';
        }
        if ($name === \strtoupper($name)) {
            return "HELLO $name";
        }

        return "Hello, $name";
    }

    public function greetMany(array $names): string
    {
        return "Hello, {$names[0]} and {$names[1]}";
    }

    public function greetAll(array $names): string
    {
        $greet = 'Hello';
        for ($i = 0; $i < \count($names); $i++) {
            if ($i === \count($names) - 1) {
                $greet .= " and {$names[$i]}";
            } else {
                $greet .= ",{$names[$i]}";
            }
        }

        return $greet;
    }

    public function greetMixed(array $names): string
    {
        $upperNames = [];

        for ($i = 0; $i < \count($names); $i++) {
            if ($names[$i] === \strtoupper($names[$i])) {
                $upperNames[] = $names[$i];
            }
        }

        //“Hello, Amy and Charlotte. ANDHELLO BRIAN!”
        $normalGreed = 'Hello';
        $shoudedGreed = 'AND HELLO ';
        for ($i = 0; $i < \count($names); $i++) {
            if ($names[$i] === \strtoupper($names[$i])) {
                $shoudedGreed .= "{$names[$i]}!";
            } else {
                if ($i === \count($names) - 1) {
                    $normalGreed .= " and {$names[$i]}. ";
                } else {
                    $normalGreed .= ", {$names[$i]}";
                }
            }
        }
        $finalGreed = $normalGreed;
        $finalGreed .= $shoudedGreed;

        return $finalGreed;
    }

    public function greetNamesContainingComma(array $names): string
    {
        $name2 = \explode(',', $names[1])[0];
        $name3 = \explode(',', $names[1])[1];

        return "Hello, {$names[0]}, {$name2}, and {$name3}";
    }

    public function greetEscapingIntentionalCommas(array $names): string
    {
        (\preg_match('/"([^"]+)"/', $names[1], $name));
        $name2 = \explode(',', $name[1])[0];
        $name3 = \explode(',', $name[1])[1];

        return "Hello, {$names[0]} and $name2,$name3.";
    }
}// end of class
