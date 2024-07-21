<?php require_once "header.php"; ?>
<?php
$html_oder = "";
$tongod=0;

if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = "";
} else {
    foreach ($_SESSION['giohang'] as $spod) {
        extract($spod);
        $ttod=$soluong*$price;
        $html_oder .= '<tr>
                            <td>
                                <p>'.$name.'/p>
                            </td>
                            <td>
                                <h5>x '.$soluong.'</h5>
                            </td>
                            <td>
                                <p>'.$price.' VNĐ</p>
                            </td>
                        </tr>';
                        $tongod+=$ttod;
    }
    ;

}

?>
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?=$html_oder?>
                        <tr>
                            <td>
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Flat rate: Free</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p><?=$tongod?></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once "footer.php"; ?>