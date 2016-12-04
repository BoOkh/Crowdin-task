<?php
namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;

class Post extends Model
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function selectPartially($table, $page = 1)
    {
        $limit = self::SHOW_ON_PAGE;
        $offset = ($page - 1) * self::SHOW_ON_PAGE;
        try {
            $sql = "SELECT * FROM {$table} LIMIT :limit OFFSET :offset";

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
            $statement->bindParam(':offset', $offset, PDO::PARAM_INT);

            $statement->setFetchMode(PDO::FETCH_ASSOC);

            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $statement->fetchAll();
    }
}