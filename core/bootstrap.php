<?php
require 'vendor/autoload.php';

use App\Core\{App, Model};
use App\Models\{Post, Admin};
use App\Core\Database\Connection;

App::bind('config', require 'config.php');
$connection = Connection::make(App::get('config')['database']);
App::bind('dbModel', new Model($connection));
App::bind('dbPost', new Post($connection));
App::bind('dbAdmin', new Admin($connection));
