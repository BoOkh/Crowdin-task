<?php
namespace App\Controllers;

use App\Core\App;
use App\Core\Controller;

/**
 * Class PagesController
 * @package App\Controllers
 */
class PagesController extends Controller
{
    /**
     * Home page
     */
    public function getHome()
    {
        $posts = App::get('dbPost')->selectPartially('posts', 1);

        $this->view->render('home', compact('posts'));
    }

    /**
     *
     * @param $postId
     */
    public function getPost($postId)
    {
        $post = App::get('dbModel')->selectById('posts', $postId);

        $this->view->render('view', compact('post'));
    }

    /**
     * Load more posts (On home page).
     * @param int $page
     * @return string
     */
    public function postPosts()
    {
        $page = $_POST['page'];

        $posts = App::get('dbPost')->selectPartially('posts', $page);

        echo json_encode($posts);
    }

    /**
     * Receiving post data in json. (This is for a publication downloading)
     */
    public function postPost()
    {
        $postId = $_POST['postId'];

        $post = App::get('dbModel')->selectById('posts', $postId);

        echo json_encode($post);
    }
}