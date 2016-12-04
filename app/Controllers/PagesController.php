<?php
namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;

class PagesController extends Controller
{
    public static $page;

    public function getHome()
    {
        $posts = App::get('dbPost')->selectPartially('posts', 1);

        $this->view->render('home', compact('posts'));
    }

    public function getPost($postId)
    {
        $post = App::get('dbModel')->selectById('posts', $postId);

        $this->view->render('view', compact('post'));
    }

    /**
     * <p>Load more posts (On home page).</p>
     * @param int $page
     * @return string
     */
    public function postPosts()
    {
        static::$page = $_POST['page'];

        $posts = App::get('dbPost')->selectPartially('posts', static::$page);

        echo json_encode($posts);
    }
}