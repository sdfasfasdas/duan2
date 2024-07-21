<?php
$billalll = get_all_bill();
$html_bill = "";
$i = 1;
$tonghh = 0;
$usermen = user_select_all();
$html_u = "";
$tsp = getAll_SanPham($db);
$tongsp = 0;
foreach ($tsp as $spsp) {
    $tongsp++;
}
$ttg = getAll_tg($db);
$tongtg = 0;
foreach ($ttg as $tg) {
    $tongtg++;
}
$tdm = getAll_dm($db);
$tongdm = 0;
foreach ($tdm as $dm) {
    $tongdm++;
}
$tongu = 0;
foreach ($usermen as $u) {
    $tongu++;
    $html_u .= '<tr>
                    <td>' . $u[0] . '</td>
                    <td>' . $u[1] . '</td>
                </tr>';
}
foreach ($billalll as $bill) {
    $tonghh += $bill[12];
    $html_bill .= '<tr>
                        <td>' . $i . '</td>
                        <td><a class="bookbill" href="?ctrl=donhang&act=show&id=' . $bill[0] . '">' . $bill['mahd'] . '</a></td>
                        <td>' . $bill['tongthanhtoan'] . '</td>
                    </tr>';
    $i++;
}
$billalll10 = get_all_bill_10();
$html_bill10 = "";
foreach ($billalll10 as $bill10) {
    if ($bill10[13] == "Đã hủy") {
        $html_bill10 .= '<tr>
                    <td><a class="bookbill" href="?ctrl=donhang&act=show&id=' . $bill10[0] . '">' . $bill10['mahd'] . '</a></td>
                    <td style="background-color: red; color: #fff; padding: 5px 10px; border-radius: 3px;">' . $bill10['trangthai'] . '</td>
                    </tr>';
    } else {
        $html_bill10 .= '<tr>
                    <td><a class="bookbill" href="?ctrl=donhang&act=show&id=' . $bill10[0] . '">' . $bill10['mahd'] . '</a></td>
                    <td style="background-color: #3498db; color: #fff; padding: 5px 10px; border-radius: 3px;">
                    <a href="?ctrl=trangchu&act=edit&id='.$bill10[0].'" style="text-decoration: none; color: inherit;">
                        '.$bill10['trangthai'].'
                     </a>
                    </td>
                    </tr>';
    }
}

?>

<h3 class="title-page">
    Trang thống kê
</h3>
<section class="statistics row">
    <div class="col-sm-12 col-md-6 col-xl-3">
        <a href="products.html">
            <div class="card mb-3 widget-chart">
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    <h5>
                        Tổng sản phẩm
                    </h5>
                </div>
                <span class="widget-numbers">
                    <?= $tongsp ?>
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <a href="user.html">
            <div class="card mb-3 widget-chart">

                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    <h5>
                        Tổng thành viên
                    </h5>
                </div>
                <span class="widget-numbers">
                    <?= $tongu ?>
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <a href="caterogies.html">
            <div class="card mb-3 widget-chart">
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    <h5>
                        Tổng Loại Sách
                    </h5>
                </div>
                <span class="widget-numbers">
                    <?= $tongdm ?>
                </span>
            </div>
        </a>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <a href="#">
            <div class="card mb-3 widget-chart">
                <div class="widget-subheading fsize-1 pt-2 opacity-10 text-warning font-weight-bold">
                    <h5>
                        Tổng Tác Giả
                    </h5>
                </div>
                <span class="widget-numbers">
                    <?= $tongtg ?>
                </span>
            </div>
        </a>
    </div>
</section>
<section class="row">
    <div class="col-sm-12 col-md-6 col xl-6">
        <div class="card chart">
            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                    <span class="input-group-text">Đến ngày</span>
                    <input type="date" class="form-control" placeholder="Server" aria-label="Server">
                    <button type="button" class="btn btn-primary">Xem</button>
                </div>
            </form>
            <p>Tổng doanh thu: <span>
                    <?= $tonghh ?> VNĐ
                </span></p>
            <table class="revenue table table-hover">
                <thead>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Doanh thu</th>
                </thead>
                <?= $html_bill ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card chart">
            <h4>Đơn hàng mới</h4>
            <table class="revenue table table-hover">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th>Trạng thái</th>
                </thead>
                <tbody>
                    <?= $html_bill10 ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-xl-3">
        <div class="card chart">
            <h4>Khách hàng mới</h4>
            <table class="revenue table table-hover">
                <thead>
                    <th>#</th>
                    <th>Username</th>
                </thead>
                <?= $html_u ?>
                </tbody>
            </table>
        </div>
    </div>
</section>