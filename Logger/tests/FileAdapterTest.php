<?php

/**
 * This file is part of `niccolo/learning-test`.
 * (c) 2016-2020 prooph software GmbH <contact@prooph.de>
 * (c) 2016-2020 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

require 'vendor/autoload.php';

use Acme\FileAdapter;
use Acme\Logger;

use PHPUnit\Framework\TestCase;

final class FileAdapterTest extends TestCase
{
    private $loggerFile;
    private $filePath = '/var/www/html/LearningPhpunit/log.txt';

    public function setUp(): void
    {
        $this->loggerFile = new Logger(new FileAdapter($this->filePath));

        if (\file_exists($this->filePath)) {
            \unlink($this->filePath);
        }
    }

    /**
     * @test
     */
    public function fileLenght()
    {
        $this->loggerFile->log('ciao');
        $this->loggerFile->log('');
        $this->loggerFile->log('ciccio');
        $this->loggerFile->log('');
        $this->loggerFile->log('');
        $this->loggerFile->log('bravo');
        $this->assertEquals(3, \count($this->loggerFile->get()));
        if (\file_exists($this->filePath)) {
            \unlink($this->filePath);
        }
    }
}
