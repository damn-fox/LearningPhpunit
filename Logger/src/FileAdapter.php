<?php

declare(strict_types=1);

namespace Acme;

class FileAdapter implements LoggerAdapter
{
    private $filePath;
    

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
        if (!file_exists($this->filePath)) {
            $fp = fopen($this->filePath, 'w');
            fclose($fp);
        }
    }

    public function log(string $userString): void
    {
        file_put_contents($this->filePath, $userString . PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public function get(): array
    {
        $message = [];

        $fn = file($this->filePath);
        foreach ($fn as $line) 
        {
            $message[] =$line;
        }
        return $message;
    }
} // end class fileadapter implements interface
