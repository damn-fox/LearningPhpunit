<?php declare(strict_types=1);

require "vendor/autoload.php";

use Acme\DummyAdapter;
use Acme\FileAdapter;
use Acme\DBAdapter;
use Acme\Logger;

use PHPUnit\Framework\TestCase;


final class LoggerTest extends TestCase
{

    private $loggerDummy;
    private $loggerFile;
    private $loggerDb;
    private $filePath = '/var/www/html/LearningPhpunit/log.txt';
    private $dbPath = '/var/www/html/LearningPhpunit/configDB.db';

    public function setUp(): void
    {
        unlink($this->filePath);
        unlink($this->dbPath);

        $this->loggerDummy = new Logger(new DummyAdapter());
        $this->loggerFile = new Logger(new FileAdapter($this->filePath));
        $this->loggerDb = new Logger(new DBAdapter($this->dbPath));
    }

    /**
     * @test
     */
    public function createValidInstance()
    {
        $this->assertInstanceOf(
            Logger::class,
            new Logger(new DummyAdapter())
        );
    }

    /**
     * @test
     */
    public function arrayLenght()
    {
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("ciao");
        $this->assertEquals(3,count($this->loggerDummy->get()));
    }

    /**
     * @test
     */
    public function arrayHoldsTheValue()
    {
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("Sono una stringa");
        $this->loggerDummy->log("");
        $this->assertEquals("Sono una stringa",$this->loggerDummy->get()[2]);
    }

    /**
     * @test
     */
    public function arrayDoesntHoldsTheValue()
    {
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("ciao");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("Sono una stringa");
        $this->loggerDummy->log("");
        $this->assertNotEquals("Sono unastringa",$this->loggerDummy->get()[2]);
    }

    /**
     * @test
     */
    public function enterAllEmptyStrings()
    {
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->loggerDummy->log("");
        $this->assertEquals(0,count($this->loggerDummy->get()));
    }

    /**
     * @test
     */
    public function fileLenght()
    {
        $this->loggerFile->log("ciao");
        $this->loggerFile->log("");
        $this->loggerFile->log("ciccio");
        $this->loggerFile->log("");
        $this->loggerFile->log("");
        $this->loggerFile->log("bravo");
        $this->assertEquals(3,count($this->loggerFile->get()));
    }

    /**
     * @test
     */
    public function DbLenght()
    {
        $this->loggerDb->log("ciao");
        $this->loggerDb->log("");
        $this->loggerDb->log("ciccio");
        $this->loggerDb->log("");
        $this->loggerDb->log("");
        $this->loggerDb->log("bravo");
        $this->assertEquals(3,count($this->loggerDb->get()));
    }

    
}


?>