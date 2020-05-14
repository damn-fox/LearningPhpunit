<?php declare(strict_types=1);

require "vendor/autoload.php";

use Acme\DummyAdapter;
use Acme\Logger;

use PHPUnit\Framework\TestCase;


final class LoggerTest extends TestCase
{

    private $logger;

    public function setUp(): void
    {
        $this->logger = new Logger(new DummyAdapter());
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
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("ciao");
        $this->assertEquals(3,count($this->logger->get()));
    }

    /**
     * @test
     */
    public function arrayHoldsTheValue()
    {
        $this->logger->log("ciao");
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("Sono una stringa");
        $this->logger->log("");
        $this->assertEquals("Sono una stringa",$this->logger->get()[2]);
    }

    /**
     * @test
     */
    public function arrayDoesntHoldsTheValue()
    {
        $this->logger->log("ciao");
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("Sono una stringa");
        $this->logger->log("");
        $this->assertNotEquals("Sono unastringa",$this->logger->get()[2]);
    }

    /**
     * @test
     */
    public function enterAllEmptyStrings()
    {
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("");
        $this->assertEquals(0,count($this->logger->get()));
    }
    
}


?>