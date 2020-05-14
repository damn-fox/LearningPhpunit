<?php

declare(strict_types=1);

namespace Acme;

use \PDO;
use \PDOException;

/*
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
    */

interface LoggerAdapter
{
    public function log(string $userString): void;

    public function get(): array;
}// end interface

class FileAdapter implements LoggerAdapter
{
    private $filePath;
    private $message = [];

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if(!file_exists($this->filePath))
        {
            $fp = fopen($this->filePath, 'w');
            fclose($fp);
        }
    }

    public function log(string $userString): void
    {
        $this->message[] = $userString;
        file_put_contents($this->filePath, $userString.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    public function get(): array
    {
        return $this->message;
    }
}// end class fileadapter implements interface

class DummyAdapter implements LoggerAdapter
{
    private $message = [];

    public function log(string $userString): void
    {
        $this->message[] = $userString;
    }

    public function get(): array
    {
        return $this->message;
    }
}

final class Logger
{
    public function __construct(LoggerAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function log(string $userString): void
    {
        if ($userString === '') {
            return;
        }

        $this->adapter->log($userString);
    }

    public function get(): array
    {
        return $this->adapter->get();
    }
} // end class logger 
