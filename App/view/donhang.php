


<?php
if(isset($_GET['vnp_ResponseCode'])&&($_GET['vnp_ResponseCode']===00)){
   header('Location: index.php?pg=hoanthanhdon');
}
if (isset($_SESSION['ttnt'])) {
    echo '<script>alert("' . $_SESSION['ttnt'] . '");</script>';
    unset($_SESSION['ttnt']);
}
if (isset($_POST['dathang'])) {
    $propage1 = new App\Controllers\DonhangController;
    $propage1->xuly();
}

$viewshow = new App\Models\ViewModel;
$tongh = 0;
$showtong = 0;
if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    $htmlshowdonhang = "";
} else {
    $htmlshowdonhang = $viewshow->Show_donhang($_SESSION['giohang']);
    $giohangct = $_SESSION['giohang'];
    foreach ($giohangct as $sp) {
        extract($sp);
        $tt = $soluong * $price;
        $tongh += $tt;
        $showtong = number_format($tongh, 0, '.', ',');
    }
}

?>
<?php require_once "header.php"; ?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="returning_customer">
            <div class="check_title">
                <h2>Bạn Đã Có Tài Khoản? <a href="#">Đăng Nhập</a></h2>
            </div>
            <p>Đăng nhập để tiết kiệm thời gian khi thanh toán và theo dõi đơn hàng của bạn.</p>
        </div>
        <div class="cupon_area">
            <div class="check_title">
                <h2>Have a coupon? <a href="#">Click here to enter your code</a></h2>
            </div>
            <input type="text" placeholder="Enter coupon code">
            <a class="tp_btn" href="#">Apply Coupon</a>
        </div>
        <div class="billing_details">
            <form class="row contact_form" action="index.php?pg=donhang" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Thông Tin Khách Hàng:</h3>

                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" placeholder="Họ Tên Khách Hàng"
                                name="hoten" required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="Địa Chỉ " id="last" name="diachi"
                                required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" placeholder="Số Điện Thoại "
                                name="dienthoai" required>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" placeholder="Email " id="email" name="email"
                                required>
                        </div>
                        <div class="ttdathang">
                            <a onclick="showttnhanhang()" style="cursor: pointer;">
                                &rArr; Thay đổi thông tin nhận hàng
                            </a>
                        </div>
                        <div class="ttdathang" id="ttnhanhang">
                            <h3>Thông tin người nhận hàng</h3>

                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" placeholder="Họ Tên Khách Hàng Nhận"
                                    name="hoten_nguoinhan">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" placeholder="Địa Chỉ Người Nhận" id="last"
                                    name="diachi_nguoinhan">
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number"
                                    placeholder="Số Điện Thoại Người Nhận " name="dienthoai_nguoinhan">
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Ghi chú</h3>
                            </div>
                            <textarea class="form-control" name="ghichu" id="message" rows="1"
                                placeholder="Ghi chú"></textarea>
                        </div>


                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn Hàng</h2>
                            <ul class="list">
                                <?= $htmlshowdonhang ?>
                            </ul>
                            <ul class="list list_2">
                                <li>Shipping <span>Flat rate: Free</span></li>
                                <li><a href="#">Tổng: <span>
                                            <?= $showtong ?>
                                        </span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="pttt" checked>
                                    <label for="f-option5">Check payments</label>
                                    <div class="check"></div>
                                </div>
                                <p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
                                    Store Postcode.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="pttt" value="VNPAY">
                                    
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                    account.</p>
                            </div>
                            <button type="submit" name="dathang">Đặt Hàng</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

<?php require_once "footer.php"; ?>
<script>
    var ttnhanhang = document.getElementById("ttnhanhang");
    ttnhanhang.style.display = "none";
    function showttnhanhang() {
        if (ttnhanhang.style.display == "none") {
            ttnhanhang.style.display = "block";
        } else {
            ttnhanhang.style.display = "none";
        }
    }


</script>