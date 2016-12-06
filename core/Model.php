<?php
namespace App\Core;

use PDO;
use PDOException;

class Model
{
    const SHOW_ON_PAGE = 3;

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectById($table, $id)
    {
        try {
            $sql = "SELECT * FROM {$table} WHERE id = :id";

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $statement->execute();

            return $statement->fetch(); //PDO::FETCH_CLASS - inside fetch
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}