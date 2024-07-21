<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DatabaseModel;

class LoginController extends BaseController
{
    private $databaseModel;
    private $userModel;

    function __construct()
    {
        $this->databaseModel = new DatabaseModel;
        $this->userModel = new UserModel($this->databaseModel);
    }

    function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['tendn']) && isset($_POST['pass'])) {
                $tendn = $_POST['tendn'];
                $pass = $_POST['pass'];
                $kq = $this->userModel->checkUserCredentials($tendn, $pass);
                if (is_array($kq) && count($kq) > 0) {
                    $_SESSION['user_id'] = $kq;
                    header('Location: index.php?pg=home');
                    exit();
                } else {
                    header('Location: index.php?pg=login');
                    $_SESSION['login_tb'] = '<span style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng.</span>';
                }
            }
        }

        $this->renderView("login", $this->titlepage, $this->data);
    }
}