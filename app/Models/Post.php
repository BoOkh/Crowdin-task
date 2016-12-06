<?php
namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    /**
     * <p>Select partial publications</p>
     * @param $table
     * @param int $page
     * @return mixed
     */
    public function selectPartially($table, $page = 1)
    {
        $limit = self::SHOW_ON_PAGE;
        $offset = ($page - 1) * self::SHOW_ON_PAGE;
        try {
            $sql = "SELECT * FROM {$table} ORDER BY id DESC LIMIT :limit OFFSET :offset";

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

    /**
     * Create new publication
     * @param $title
     * @param $short_description
     * @param $description
     * @return bool
     */
    public function create($title, $short_description, $description)
    {
        try {
            $sql = "INSERT INTO posts (title, short_description, description, created_at) VALUES (:title, :short_description, :description, NOW())";
            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':title', $title, PDO::PARAM_STR);
            $statement->bindParam(':short_description', $short_description, PDO::PARAM_STR);
            $statement->bindParam(':description', $description, PDO::PARAM_STR);

            return ($statement->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit($title, $short_description, $description, $id)
    {
        try {
            $sql = "UPDATE posts SET title = :title, short_description = :short_description, description = :description WHERE id = :id";

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':title', $title, PDO::PARAM_STR);
            $statement->bindParam(':short_description', $short_description, PDO::PARAM_STR);
            $statement->bindParam(':description', $description, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            return ($statement->execute()) ? true : false;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}