<?php

/**
 * This file is part of `niccolo/learning-test`.
 * (c) 2016-2020 prooph software GmbH <contact@prooph.de>
 * (c) 2016-2020 Sascha-Oliver Prolic <saschaprolic@googlemail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        if ($this->pdo === null) {
            $this->pdo = new \PDO('sqlite:'.$this->DbPath);
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
