<?php
namespace ct_api;

class Connection
{
    private $pdo = null;

    public function __construct(string $dbName)
    {
        $dsn = 'mysql:dbname='. $dbName. ';host='. $_SERVER['DB_HOST'].';charset=utf8mb4';
        $username = $_SERVER['DB_USER'];
        $password = $_SERVER['DB_PASSWORD'];
        $driver_options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->$pdo = new \PDO(
            $dsn, 
            $username,
            $password, 
            $driver_options
        );
    }

    public function fetchAll(string $query, array $bindParams = []): array
    {
        $stmt = $this->$pdo->prepare($query);
        $stmt->execute($bindParams);
        return $stmt->fetchAll();
    }

    public function fetchOne(string $query, array $bindParams = []): ?array
    {
        $stmt = $this->$pdo->prepare($query);
        $stmt->execute($bindParams);
        $result = $stmt->fetch();
        if(empty($result)) {
            return null;
        }
        return $result;
    }
}