<?php require_once "header.php"; ?>
<?php
if (!isset($_SESSION['login_tb']) || $_SESSION['login_tb'] === "") {
    $_SESSION['login_tb'] = "or use your email password";
}
?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shop Category page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Fashon Category</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container1" id="container1">
    <div class="form-container sign-up">
        <form action="" method="post" novalidate="novalidate">
            <h1>Đăng Ký</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>
                <?= $_SESSION['login_tb'] ?>
                <?php
                unset($_SESSION['login_tb']);
                ?>
            </span>
            <input type="text" placeholder="Tên Đăng Nhập" name="tendn">

            <input type="text" placeholder="Số Điện Thoại" name="dienthoai">
            <input type="text" placeholder="Địa Chỉ" name="diachi">
            <input type="password" placeholder="Mật Khẩu" name="pass">
            <input type="password" placeholder="Xác Nhận Mật Khẩu" name="checkpass">
            <button name="dangky" type="submit">Đăng Ký</button>
        </form>

    </div>
    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-right">
                <h1>Xin Chào!</h1>
                <p>Bạn đã có chưa có tài khoản?</p>
                <a href="index.php?pg=login" id="register">Đăng Ký</a>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>