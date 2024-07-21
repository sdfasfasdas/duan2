<?php
if (isset($_GET["id"])) {
    $ma = $_GET["id"];
    $sql = "DELETE FROM tacgia WHERE  id = $ma";
    $result = $db->exec($sql);
}
$rows_l = getAll_tacgia($db);
$deml = 1;
$html_laoisp = "";
foreach ($rows_l as $row) {
    extract($row);
    $html_laoisp .= '
        <tr>
            <td>' . $deml . '</td>
            <td>' . $ten . '</td>
            <td>' . $home . '</td>
            <td>' . $stt . '</td>
            <td>
                <a href="?ctrl=tacgia&act=edit&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                <a href="?ctrl=tacgia&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
            </td>
        </tr>';
    $deml++;
}
?>
<h3 class="title-page">
    Tác Giả
</h3>

<div class="d-flex justify-content-end">
    <a href="?ctrl=tacgia&act=add" class="btn btn-primary mb-2">Thêm sản phẩm</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Hiện Giao Diện</th>
            <th>Số Thứ Tự Trong Loại</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?= $html_laoisp ?>
    </tbody>
    <tfoot>
        <tr>
            <th>STT</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Hiện Giao Diện</th>
            <th>Số Thứ Tự Trong Loại</th>
            <th>Thao Tác</th>
        </tr>
    </tfoot>
</table>