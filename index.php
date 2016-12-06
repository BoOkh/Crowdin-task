<?php
ini_set('display_errors', 0);
error_reporting(0);

session_start();
require 'core/bootstrap.php';

define('VIEWS_BASEDIR', 'app/Views/');

use App\Core\{Router, Request};

Router::run('app/routes.php')
    ->determine(Request::uri(), Request::method());

