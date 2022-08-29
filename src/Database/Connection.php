<?php

namespace Archive\Mvc\Database;

use PDO;

class Connection
{
    private string $dsn;
    private ?string $username;
    private ?string $password;

    public function __construct()
    {
        $config = self::parseConfig();
        $this->dsn = $config['driver'] . ':dbname=' . $config['dbname'] . ';host=' . $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
    }

    public function open(): PDO
    {
        return new PDO($this->dsn, $this->username, $this->password);
    }

    private function parseConfig(): array
    {
        $location = __DIR__ . '\..\..\config\config.ini';
        return parse_ini_file($location);
    }
}
