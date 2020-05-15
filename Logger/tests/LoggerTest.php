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

    public function setUp(): void
    {
        $this->loggerDummy = new Logger(new DummyAdapter());
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
}


?>