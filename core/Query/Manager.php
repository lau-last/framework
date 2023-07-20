<?php

namespace Core\Query;

use Core\Render\PHPRender;
use PDO;
use PDOStatement;

class Manager
{

    /**
     * @var PDO
     */
    private PDO $pdo;


    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @param string $query
     * @param array $param
     * @return PDOStatement
     */
    public function queryExecute(string $query, array $param = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($query);
        if ($param !== []) {
            foreach ($param as $key => $value) {
                $stmt->bindValue($key, $value);
            }
        }

        $stmt->execute();
        return $stmt;
    }


    /**
     * @param string $query
     * @param array $param
     * @return array
     */
    public function fetch(string $query, array $param = []): array
    {
        $stmt = $this->queryExecute($query, $param);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }


    /**
     * @param string $query
     * @param array $param
     * @return array
     */
    public function fetchAll(string $query, array $param = []): array
    {
        $stmt = $this->queryExecute($query, $param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }


}
