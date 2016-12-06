<?php
namespace App\Core;

use PDO;
use PDOException;

/**
 * Class Model
 * @package App\Core
 */
class Model
{
    /**
     * Count publications per page
     */
    const SHOW_ON_PAGE = 3;

    /**
     * @var $pdo <p>PDO object(contain connection to database)</p>
     */
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select post by id
     * @param $table
     * @param $id
     * @return mixed
     */
    public function selectById($table, $id)
    {
        try {
            $sql = "SELECT * FROM {$table} WHERE id = :id";

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $statement->execute();

            return $statement->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}