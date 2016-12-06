<?php
namespace App\Controllers;

use App\Core\{App, Controller, Helper};
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Admin::checkLogged();
    }

    public function getLogin()
    {
        $data = [
            'title' => 'Login',
            'description' => 'Login page'
        ];

        $this->view->render('login', compact('data'));
    }

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

    public function getLogout()
    {
        Admin::logout();
        Helper::redirect();
    }

    public function getCreate()
    {
        $data = [
            'title' => 'Create post',
            'description' => 'Create new post'
        ];

        $this->view->render('create', compact('data'));
    }

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
}