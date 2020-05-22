<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Greeting
{
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
        if (\count($names) !== 2) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of two names!'));
        }

        return "Hello, {$names[0]} and {$names[1]}";
    }

    public function greetAll(array $names): string
    {
        if (\count($names) <= 2) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of three or more names!'));
        }
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
        if (\count($names) < 3) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of three or more names!'));
        }
        for ($i = 0; $i < \count($names); $i++) {
            if ($names[$i] === \strtoupper($names[$i])) {
                $upperNames[] = $names[$i];
            }
        }
        if (\count($upperNames) > 1) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of one upper name!'));
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
        if (\count($names) < 2) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of three or more names!'));
        }
        if (\explode(',', $names[1]) === false) {
            throw new \InvalidArgumentException(\sprintf('Names separated by commas must be the second element of the array!'));
        }
        $name2 = \explode(',', $names[1])[0];
        $name3 = \explode(',', $names[1])[1];

        return "Hello, {$names[0]}, {$name2}, and {$name3}";
    }

    public function greetEscapingIntentionalCommas(array $names): string
    {
        if (\count($names) < 2) {
            throw new \InvalidArgumentException(\sprintf('Array must consist of three names!'));
        }
        if (\explode(',', $names[1]) === false) {
            throw new \InvalidArgumentException(\sprintf('Names separated by commas must be the second element of the array!'));
        }
        (preg_match('/"([^"]+)"/', $names[1], $name));
        $name2 = explode(',',$name[1])[0];
        $name3 = explode(',',$name[1])[1];
        return "Hello, {$names[0]} and $name2,$name3.";
    }
}// end of class
