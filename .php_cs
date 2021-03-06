<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

$config = new Prooph\CS\Config\Prooph();
$config->getFinder()->in(__DIR__);
$config->getFinder()->append(['.php_cs']);

$cacheDir = \getenv('TRAVIS') ? \getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
