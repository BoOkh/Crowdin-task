<?php
namespace App\Controllers;

use App\Core\{App, Controller, Helper};
use App\Models\Admin;

/**
 * Class AdminController
 * @package App\Controllers
 */
class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Admin::checkLogged();
    }

    /**
     * Login page
     */
    public function getLogin()
    {
        $data = [
            'title' => 'Login',
            'description' => 'Login page'
        ];

        $this->view->render('login', compact('data'));
    }

    /**
     * Making login
     */
    public function postMakeLogin()
    {
        $login = $_POST['login'];
        $password = hash_hmac('ripemd160', $_POST['password'], 'LwvCd+Xefv>@&[-:');
        $_SESSION['error'] = false;

        if(!App::get('dbAdmin')->auth($login, $password)) {
            $_SESSION['error'] = 'Incorrect login or password.';
            Helper::redirect('login');
        } else {
            Admin::makeAuth();
            Helper::redirect();
        }
    }

    /**
     * Making logout
     */
    public function getLogout()
    {
        Admin::logout();
        Helper::redirect();
    }

    /**
     * Create a post
     */
    public function getCreate()
    {
        $data = [
            'title' => 'Create post',
            'description' => 'Create new post'
        ];

        $this->view->render('create', compact('data'));
    }

    /**
     * Post creation
     */
    public function postMakeCreate()
    {
        $title = $_POST['title'];
        $short_description = $_POST['short_description'];
        $description = $_POST['description'];

        if(!App::get('dbPost')->create($title, $short_description, $description)) {
            $_SESSION['error'] = 'Error post creating.';
        } else {
            $_SESSION['success'] = 'The post has been created successfully.';
        }
        Helper::redirect('create');
    }

    /**
     * Upload file and create post
     */
    public function postMakeCreateUpload()
    {
        $upload = file_get_contents($_FILES['post']['tmp_name']);

        $data = json_decode($upload, true);

        $title = $data['title'];
        $short_description = $data['short_description'];
        $description = $data['description'];

        if(!App::get('dbPost')->create($title, $short_description, $description)) {
            $_SESSION['error'] = 'Error post creating.';
        } else {
            $_SESSION['success'] = 'The post has been created successfully.';
        }
        Helper::redirect('create');
    }

    /**
     * Delete publication
     */
    public function getDelete($id)
    {
        if(App::get('dbModel')->delete('posts', $id)) {
            Helper::redirect();
        }
    }

    /**
     * Edit publication page
     * @param $id <p>post id</p>
     */
    public function getEdit($id)
    {
        $data = [
            'title' => 'Edit post',
            'description' => 'Updating post'
        ];

        $post = App::get('dbModel')->selectById('posts', $id);

        $this->view->render('edit', compact('data', 'post'));
    }

    /**
     * <p>Editing process
     */
    public function postMakeEdit()
    {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $short_description = $_POST['short_description'];
        $description = $_POST['description'];

        if(!App::get('dbPost')->edit($title, $short_description, $description, $id)) {
            $_SESSION['error'] = 'Error post editing.';
        } else {
            $_SESSION['success'] = 'The post has been edited successfully.';
        }
        Helper::redirect('edit/' . $id);
    }
}