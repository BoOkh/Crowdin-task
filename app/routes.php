<?php
                //controller(require)@action(require)@parameters
$router->get('', 'PagesController@getHome');
$router->get('post/([0-9]+)', 'PagesController@getPost@$1');
$router->post('posts', 'PagesController@postPosts');
$router->post('post', 'PagesController@postPost');

$router->get('login', 'AdminController@getLogin');
$router->post('makeLogin', 'AdminController@postMakeLogin');
$router->get('logout', 'AdminController@getLogout');
$router->get('create', 'AdminController@getCreate');
$router->post('makeCreate', 'AdminController@postMakeCreate');
$router->post('makeCreateUpload', 'AdminController@postMakeCreateUpload');