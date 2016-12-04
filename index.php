<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'core/bootstrap.php';

define('VIEWS_BASEDIR', 'app/Views/');
/*
setlocale(LC_ALL, 'uk_UA.utf8');
$day = date('j');
$month = mb_substr(strftime('%B'), 0, 3);
$year = date('y');
echo $day . ' ' . $month . ', ' . $year;
*/

use App\Core\{Router, Request};

Router::run('app/routes.php')
    ->determine(Request::uri(), Request::method());

