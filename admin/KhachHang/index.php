<?php
$rows_kh = user_select_all();
$html_khahang = "";
foreach ($rows_kh as $kh) {
    extract($kh);
    $html_khahang .= '<tr>
                <td>' . $id . '</td>
                <td>' . $tendn . '</td>
                <td>' . $pass . '</td>
                <td>' . $ten . '</td>
                <td><img src="../view/images/' . $hinhanh . '" width="50" height="50"></td>
                <td>' . $email . '</td>
                <td>' . $diachi . '</td>
                <td>' . $dienthoai . '</td>
                <td>' . $role . '</td>
                <td>' . $gioitinh . '</td>
                <td>
                <a href="?ctrl=khachhang&act=edit&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                </td>
            </tr>';
}
?>

<h3 class="title-page">
    Thành viên
</h3>
<div class="d-flex justify-content-end">
    <a href="?ctrl=LoaiSP&act=add" class="btn btn-primary mb-2">Thêm thành viên</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên Đăng Nhập</th>
            <th>Mật Khẩu</th>
            <th>Tên</th>
            <th>Hình Ảnh</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Role</th>
            <th>Giới Tính</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?= $html_khahang ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên Đăng Nhập</th>
            <th>Mật Khẩu</th>
            <th>Tên</th>
            <th>Hình Ảnh</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Role
            <th>Thao tác</th>
        </tr>
    </tfoot>
</table>