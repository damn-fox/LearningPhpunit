<?php declare(strict_types=1);

require "vendor/autoload.php";

use Acme\Logger;

use PHPUnit\Framework\TestCase;


final class LoggerTest extends TestCase
{

    private $logger;
    private $pathFile = "/var/www/html/LearningPhpunit/log.txt";

    public function setUp(): void
    {
        $this->logger = new Logger;
    }

    /**
     * @test
     */
    public function CreateValidInstance()
    {
        $this->assertInstanceOf(
            Logger::class,
            new Logger()
        );
    }

    /**
     * @test
     */
    public function ArrayLenght()
    {
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("");
        $this->logger->log("ciao");
        $this->assertEquals(3,count($this->logger->getValue()));
    }

    /**
     * @test
     */
    public function ArrayHoldsTheValue()
    {
        $this->logger->log("ciao");
        $this->logger->log("ciao");
        $this->logger->log("");
        $this->logger->log("Sono una stringa");
        $this->logger->log("");
        $this->assertEquals("Sono una stringa",$this->logger->getValue()[2]);
    }

    /**
     * @test
     */
    public function EnterAllEmptyStrings()
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
        $this->assertEquals(0,count($this->logger->getValue()));
    }

    /**
     * @test
     */
    public function CheckFileExists()
    {
        $this->assertFileExists($this->pathFile);
    }

    /**
     * @test
     */
    public function StringMatchesFile()
    {
        $text="ciao\n";
        $text.="ciao\n";
        $text.="ciao\n";
        $text.="ciao\n";
        $text.="ciao\n";
        $text.="Sono una stringa\n";

        $this->assertStringEqualsFile($this->pathFile, $text);

        if (file_exists($this->pathFile)) { 
            $fp = fopen($this->pathFile, 'w');
            fclose($fp);
        }
    }
    
    /**
     * @test
     */
    public function CheckDatabaseConnection()
    {
        $user = "damnfox";
        $pass = "damnfox30992";
        $trueConn =false;
        try {
            $connection = new PDO('mysql:host=localhost;dbname=logger', $user, $pass);
            if($connection){
                $trueConn = true;
            }
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $this->assertEquals(true,$trueConn);
    }

}


?>