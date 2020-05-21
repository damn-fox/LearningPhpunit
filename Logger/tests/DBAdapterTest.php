<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

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
