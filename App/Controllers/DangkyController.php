<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DatabaseModel;
class DangkyController extends BaseController
{
    private $databaseModel;
    private $userModel;

    function __construct()
    {
        $this->databaseModel = new DatabaseModel;
        $this->userModel = new UserModel($this->databaseModel);
    }
    public function index()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ( isset($_POST['diachi']) && isset($_POST['dienthoai']) && isset($_POST['tendn']) && isset($_POST['pass'])) {
                $texttong = "Chưa Cập Nhập";
                $tenkh = $texttong;
                $diachi = $_POST['diachi'];
                $email = $texttong;
                $sdt = $_POST['dienthoai'];
                $matkhauxn = $_POST['checkpass'];
                $tendangnhap = $_POST['tendn'];
                $matkhau = $_POST['pass'];
                $role = 0;
                $hinhanh = "user.jpg";

                $user_exists = $this->userModel->userExist($tendangnhap);

                if ($user_exists) {
                    $register_message = "Tên đăng nhập đã tồn tại.";
                } else if (!$this->userModel->isValidUsername($tendangnhap)) {
                    $register_message = "Tên đăng nhập không hợp lệ (chỉ chấp nhận chữ, số và dấu gạch dưới, từ 6 đến 20 kí tự).";
                } else if ($matkhauxn != $matkhau) {
                    $register_message = "Mật khẩu bạn nhập không trùng khớp.";
                } else if (!$this->userModel->isValidPhoneNumber($sdt)) {
                    $register_message = "Số điện thoại không hợp lệ.";
                } else {
                    $this->userModel->insertUser($tendangnhap, $matkhau, $tenkh, $hinhanh, $diachi, $sdt, $email, $role);
                    header("Location: index.php?pg=login");
                    exit();
                }
                $_SESSION['login_tb']=$register_message;
            }
            else{
                $_SESSION['login_tb']="Bạn chưa điền đầy đủ thông tin.";
            }
        }
        $this->renderView("dangky", $this->titlepage, $this->data);
    }
}