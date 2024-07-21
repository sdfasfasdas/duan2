<?php require_once "header.php"; ?>

<?php
$giohang = new App\Models\ProductModel;
$show_cart = $giohang->sanpham_show_giohang($_SESSION['giohang']);
$giohangct = $_SESSION['giohang'];
$tong = 0;
if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) {
    $showtong = 0;
} else {
    foreach ($giohangct as $sp) {
        
        extract($sp);
        $tt = $soluong * $price;
        $tong += $tt;
        $showtong = number_format($tong, 0, '.', ',');
    }
}

?>

<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Cart</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sản Phẩm</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Tổng Tiền</th>
                            <th scope="col">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $show_cart ?>
                        <tr class="bottom_button">
                            <td>
                                <a class="gray_btn" href="index.php?pg=addcart&del=1">Xóa Toàn Bộ Giỏ Hàng</a>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="gray_btn" href="#">Close Coupon</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Tổng Tiền: </h5>
                            </td>
                            <td>
                                <h5>
                                    <?= $showtong ?> VNĐ
                                </h5>
                            </td>
                        </tr>

                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="index.php?pg=sanpham">Tiếp Tục Mua Hàng</a>
                                    <a class="primary-btn" href="index.php?pg=donhang"> Đặt Hàng Đơn Hàng</a>
                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once "footer.php"; ?>

<script>
    function increaseQty(stt) {
        var qtyElement = document.getElementById('qty_' + stt);
        var qtyValue = parseInt(qtyElement.value);

        if (!isNaN(qtyValue)) {
            qtyElement.value = qtyValue + 1;
            updateSubtotal(stt);
            updateSession(stt, qtyElement.value);
        }
    }

    function reduceQty(stt) {
        var qtyElement = document.getElementById('qty_' + stt);
        var qtyValue = parseInt(qtyElement.value);

        if (!isNaN(qtyValue) && qtyValue > 1) {
            qtyElement.value = qtyValue - 1;
            updateSubtotal(stt);
            updateSession(stt, qtyElement.value);
        } else if (qtyValue === 1) {
            // Hiển thị thông báo khi số lượng là 1 và không thể giảm nữa
            alert("Số lượng không thể giảm thêm!");
        }
    }

    function updateSubtotal(stt) {
        var qtyElement = document.getElementById('qty_' + stt);
        var subtotalElement = document.getElementById('subtotal_' + stt);
        var price = parseFloat('<?php echo $price; ?>');
        var qty = parseInt(qtyElement.value);

        if (!isNaN(price) && !isNaN(qty)) {
            var subtotal = price * qty;
            subtotalElement.innerText = subtotal.toFixed(0);;
        }
    }

    function updateSession(stt, newQty) {
        // Sử dụng Ajax để cập nhật số lượng trên server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                if (!response.success) {
                    alert(response.message);
                }
            }
        };

        xhttp.open("POST", "../app/view/update_qty.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("stt=" + stt + "&newQty=" + newQty);
    }
</script>