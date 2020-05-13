<?php declare(strict_types=1);

require "vendor/autoload.php";

use Acme\Logger;

use PHPUnit\Framework\TestCase;


final class LoggerTest extends TestCase
{

    private $logger;

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
    public function CheckDatabaseConnection()
    {
            $this->logger->ChooseMethod("database");
            $this->logger->log("ciao");
            $this->logger->log("ciao");
            $this->logger->log("");
            $this->logger->log("Sono una stringa");
            $this->logger->log("");
        try {

            $user = "damnfox";
            $pass = "damnfox300992";
            $connection = new PDO('mysql:host=localhost;dbname=logger', $user, $pass);
            $sql = "SELECT * FROM log";
            $statement= $connection->prepare($sql);
            $statement->execute();
            $totale = $statement->rowCount();

            $this->assertEquals(3,$totale);
            
            $statement2 = $connection->prepare("TRUNCATE TABLE log");
            $statement2->execute();

        } catch (PDOException $e) {
            print "Error!: ".$e->getMessage()."<br/>";
            die();
        }
        
    }

}


?>