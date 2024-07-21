<?php
session_start();
include_once("model/pdo.php");
include_once("model/khachhang.php");
if (isset($_POST['login'])) {
    $tendn = $_POST['tendn'];
    $pass = $_POST['pass'];
    $checkuser = check_out($tendn, $pass);
    if (isset($checkuser) && (is_array($checkuser)) && (count($checkuser) > 0)) {
        $roll = $checkuser['role'];
        if ($roll == 1) {
            $_SESSION['user_adm'] = $checkuser;
            header("location: index.php");
        } else {
            $_SESSION['login_error'] = "Tài khoản này không phải tài khoảng admin";
        }
    } else {
        $_SESSION['login_error'] = "Tài khoản không tồi tại";
    }
} else {

}

?>

<!DOCTYPE html>
<html lang="vi">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/css1.css">
</head>

<body>
    <div class="box_maxmin">


        <h1>Đăng nhập</h1>
        <div class="form-container">
            <div class="imgcontainer">
                <img src="../view/images/King__2_-removebg-preview.png" alt="Avatar" class="avatar">
            </div>
            <form action="login.php" method="POST">
                <label for="tendangnhap">Tên đăng nhập:</label>
                <input type="text" id="tendangnhap" name="tendn" required>
                <br>
                <label for="matkhau">Mật khẩu:</label>
                <input type="password" id="matkhau" name="pass" required>
                <br>
                <label for="showPassword"><input type="checkbox" id="showPassword" onclick="togglePassword()">Hiển thị
                    mật khẩu:</label>

                <br>

                <button type="submit" name="login">Đăng nhập</button>
            </form>
            <div class="form-switch">
                <a href="#">Quên Mật Khẩu</a>
            </div>
            <?php if (isset($_SESSION['login_error'])) { ?>
                <div style="color: red; text-align: center;">
                    <?php echo $_SESSION['login_error']; ?>
                </div>
                <?php unset($_SESSION['login_error']); ?>
            <?php } ?>
        </div>
    </div>
</body>

</html>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("matkhau");
        var showPasswordCheckbox = document.getElementById("showPassword");

        if (showPasswordCheckbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>