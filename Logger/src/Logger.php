<?php declare(strict_types=1);

namespace Acme;

final class Logger
{

    private $text = array();
    private $pathFile = "/var/www/html/LearningPhpunit/log.txt";

    public function __construct()
    {
        if (!file_exists($this->pathFile)) {
            $myfile = fopen($this->pathFile, "w") or die("Unable to open file!");
            fclose($myfile);
        }

    }

    public function Log(string $userString): void
    {
        if( $userString !== '')
        {
            $this->text[] = $userString;
            
            $current = file_get_contents($this->pathFile);
            $current .= "$userString\n";
            file_put_contents($this->pathFile, $current);
        }
    }

    public function GetValue() : array
    {
        return $this->text;
    }
}


?>