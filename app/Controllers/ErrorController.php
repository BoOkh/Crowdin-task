<?php
namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;

/**
 * Class ErrorController
 * @package App\Controllers
 */
class ErrorController extends Controller
{
    public function getErrorPage404()
    {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        header("Status: 404 Not Found");
        $this->view->render('errorPage404');
        exit();
    }
}