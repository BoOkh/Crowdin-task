<?php
                //controller(require)@action(require)@parameters
$router->get('', 'PagesController@getHome');
$router->get('post/([0-9]+)', 'PagesController@getPost@$1');
$router->post('posts', 'PagesController@postPosts');