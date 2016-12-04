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

    /**
     * @param string $table <p>Table name</p>
     * @return mixed <p>Array with data</p>
     */
    public function selectAll($table)
    {
        try {
            $sql = $this->pdo->prepare("SELECT * FROM {$table}");

            $sql->execute();

            return $sql->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function selectById($table, $id)
    {
        try {
            $sql = "SELECT * FROM {$table} WHERE id = :id";

            $sql = $this->pdo->prepare($sql);

            $sql->bindParam(':id', $id, PDO::PARAM_INT);
            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetch(); //PDO::FETCH_CLASS - inside fetch
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}