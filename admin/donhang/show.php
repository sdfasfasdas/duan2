<?php
if (isset($_GET['id'])) {
    $idbill = $_GET['id'];
    $rowcart = getById_cart($db, $idbill);
    $rowcart1 = getById_bill($db, $idbill);

}
$tongsl = 0;
$tonggia = 0;
$sttc = 1;
$html_cart = "";
foreach ($rowcart as $cart) {
    $id = $cart['idsp'];
    $spc = getById_SanPham($db, $id);
    $tongsl += $cart[2];
    $tonggia += $cart[3];
    $html_cart .= '<tr>
        <td>' . $sttc . '</td>
        <td>' . $spc[1] . '</a></td>
        <td><img src="../view/images/' . $spc[2] . '" width="50" height="70"></td>
        <td>' . $cart[2] . '</td>
        <td>' . $cart[3] . '</td>
        <td>' . $spc[9]. '</td>
    </tr>';
    $sttc++;
}
?>
<h3 class="title-page">
    Chi Tiết Đơn Hàng <?=$rowcart1[1]?>
</h3>
<div class="d-flex justify-content-end">

</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Sản Phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số Lượng</th>
            <th>Giá</th>
            <th>Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        <?= $html_cart ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Số Lượng: <?=$tongsl?></th>
            <th>Giá: <?=$tonggia?></th>
            <th></th>
        </tr>
    </tfoot>
</table>