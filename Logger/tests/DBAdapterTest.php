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

use Acme\DBAdapter;
use Acme\Logger;

use PHPUnit\Framework\TestCase;

final class DBAdapterTest extends TestCase
{
    private $loggerDb;
    private $dbPath = '/var/www/html/LearningPhpunit/configDB.db';

    public function setUp(): void
    {
        $this->loggerDb = new Logger(new DBAdapter($this->dbPath));

        if (\file_exists($this->dbPath)) {
            \unlink($this->dbPath);
        }
    }

    /**
     * @test
     */
    public function DbLenght()
    {
        $this->loggerDb->log('ciao');
        $this->loggerDb->log('');
        $this->loggerDb->log('ciccio');
        $this->loggerDb->log('');
        $this->loggerDb->log('');
        $this->loggerDb->log('bravo');
        $this->assertEquals(3, \count($this->loggerDb->get()));
        if (\file_exists($this->dbPath)) {
            \unlink($this->dbPath);
        }
    }
}
