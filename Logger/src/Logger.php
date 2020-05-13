<?php declare(strict_types=1);

namespace Acme;

use \PDO;
use \PDOException;

final class Logger
{

    private $text = array();
    private $method ;
    private $pathFile = "/var/www/html/LearningPhpunit/log.txt";

    public function __construct()
    {
        if (!file_exists($this->pathFile)) {
            $myfile = fopen($this->pathFile, "w") or die("Unable to open file!");
            fclose($myfile);
        }
    }

    public function ChooseMethod($method){
        $this->method= $method;
    }

    public function Log(string $userString): void
    {
        if( $userString !== '')
        {
            $this->text[] = $userString;
            if($this->method =="file")
            {
                $current = file_get_contents($this->pathFile);
                $current .= "$userString\n";
                file_put_contents($this->pathFile, $current);
            }

            if($this->method =="database")
            {
                $user = "damnfox";
                $pass = "damnfox300992";
                try {
                    $connection = new PDO('mysql:host=localhost;dbname=logger', $user, $pass);
                    $sql = "INSERT INTO log (textlog) VALUES (?)";
                    $connection->prepare($sql)->execute([$userString]);
                } catch (PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
            }
        }
    }

    public function GetValue() : array
    {
        return $this->text;
    }
}
