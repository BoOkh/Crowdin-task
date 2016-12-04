<?php
namespace App\Core\Database;

use PDO;
use PDOException;

class Connection
{
    public static function make($config)
    {
        try {
            $db = new PDO(
                $config['connection'].';dbname='.$config['dbname'],
                $config['user'],
                $config['password']
            );
            $db->exec("set names utf8");
            return $db;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}