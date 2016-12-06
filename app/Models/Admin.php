<?php
namespace App\Models;

use App\Core\Model;
use PDO;
use PDOException;
use App\Core\Helper;

class Admin extends Model
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function auth($login, $password)
    {
        try {
            $sql = 'SELECT * FROM admin WHERE login = :login AND password = :password';

            $statement = $this->pdo->prepare($sql);

            $statement->bindParam(':login', $login, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            $statement->execute();

            $admin = $statement->fetch();

            if($admin) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remember admin to session
     */
    public static function makeAuth()
    {
        $_SESSION['admin'] = true;
    }

    /**
     * Check authorized user, or not.
     */
    public static function checkLogged()
    {
        if(isset($_SESSION['admin'])) {
            if(urldecode($_SERVER['REQUEST_URI']) == '/login') {
                Helper::redirect();
            }
        } else {
            if(urldecode($_SERVER['REQUEST_URI']) == '/create') {
                Helper::redirect();
            }
        }
    }

    /**
     * Logout from account
     */
    public static function logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['error']);
    }

}