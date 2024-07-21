<?php
$sttbill = 1;
$donhangall = donhang_select_all();
$html_bill = "";
foreach ($donhangall as $donhnag) {
    extract($donhnag);
    if ($trangthai == "Đã hủy") {
        $html_bill .= '<tr>
        <td>' . $sttbill . '</td>
        <td><a class="bookbill" href="?ctrl=donhang&act=show&id=' . $id . '">' . $mahd . '</a></td>
        <td>' . $ten . '</td>
        <td>' . $dienthoai . '</td>
        <td>' . $iduser . '</td>
        <td>' . $diachi . '</td>
        <td>' . $email . '</td>
        <td>' . $tongthanhtoan . '</td>
        <td>' . $nguoinhan . '</td>
        <td>' . $nguoinhan_sdt . '</td>
        <td>' . $nguoinhan_diachi . '</td>
        <td>' . $voucher . '</td>
        <td>' . $pttt . '</td>
        <td style="background-color: red; color: #fff; padding: 5px 10px; border-radius: 3px;">' . $trangthai . '</td>
    </tr>';
        $sttbill++;
    } else {
        $html_bill .= '<tr>
        <td>' . $sttbill . '</td>
        <td><a class="bookbill" href="?ctrl=donhang&act=show&id=' . $id . '">' . $mahd . '</a></td>
        <td>' . $ten . '</td>
        <td>' . $dienthoai . '</td>
        <td>' . $iduser . '</td>
        <td>' . $diachi . '</td>
        <td>' . $email . '</td>
        <td>' . $tongthanhtoan . '</td>
        <td>' . $nguoinhan . '</td>
        <td>' . $nguoinhan_sdt . '</td>
        <td>' . $nguoinhan_diachi . '</td>
        <td>' . $voucher . '</td>
        <td>' . $pttt . '</td>
        <td style="background-color: #3498db; color: #fff; padding: 5px 10px; border-radius: 3px;">
                    <a href="?ctrl=trangchu&act=edit&id=' . $id . '" style="text-decoration: none; color: inherit;">
                        ' . $trangthai . '
                     </a>
                    </td>
    </tr>';
        $sttbill++;
    }
}
?>
<h3 class="title-page">
    Quản Lý Đơn Hàng Của Bạn
</h3>
<div class="d-flex justify-content-end">

</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã</th>
            <th>Tên KH</th>
            <th>SDT</th>
            <th>Mã KH</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Tổng Tiền</th>
            <th>Người Nhận</th>
            <th>SDT Người Nhận</th>
            <th>Địa Chỉ Người Nhận</th>
            <th>Mã Voucher</th>
            <th>PTTT</th>
            <th>Trạng Thái</th>
        </tr>
    </thead>
    <tbody>
        <?= $html_bill ?>
    </tbody>
    <tfoot>
        <tr>
            <th>STT</th>
            <th>Mã</th>
            <th>Tên KH</th>
            <th>SDT</th>
            <th>Mã KH</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Tổng Tiền</th>
            <th>Người Nhận</th>
            <th>SDT Người Nhận</th>
            <th>Địa Chỉ Người Nhận</th>
            <th>Mã Voucher</th>
            <th>PTTT</th>
            <th>Trạng Thái</th>
        </tr>
    </tfoot>
</table>