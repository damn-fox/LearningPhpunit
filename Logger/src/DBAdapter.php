<?php

declare(strict_types=1);

namespace Acme;

class DBAdapter implements LoggerAdapter
{
    private $DbPath;
     /**
     * PDO instance
     * @var type 
     */
    private $pdo;

    public function __construct(string $DbPath)
    {
        $this->filePath = $DbPath;
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:".$this->DbPath);
        }
        $tables = 'CREATE TABLE IF NOT EXISTS log (id   INTEGER PRIMARY KEY AUTOINCREMENT,logtext TEXT NOT NULL)';
        
            $this->pdo->exec($tables);
       
    }

    public function log(string $userString): void
    {
        $insertQuery = "INSERT INTO log (logtext) VALUES ('".$userString."')";
        $this->pdo->exec($insertQuery);
    }

    public function get(): array
    {
        $result = $this->pdo->query('SELECT * FROM log'); // buffered result set
        $messages = [];
        while ($message = $result->fetchObject()) {
            $messages[] = $message;
        }

        return $messages;
    }
} // end class DBadapter implements interface