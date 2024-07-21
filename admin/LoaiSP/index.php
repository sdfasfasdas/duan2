<?php
$loaiSPModel = new LoaiSPModel($db);

// Xử lý xóa danh mục nếu có
if (isset($_GET["id"])) {
    $ma = $_GET["id"];
    
    // Kiểm tra xem có sản phẩm nào tham chiếu đến danh mục không
    $count = $loaiSPModel->countSanPhamByDanhMuc($ma);

    if ($count == 0) {
        $loaiSPModel->deleteLoaiSP($ma);
        echo "<script>alert('Xóa danh mục thành công');</script>";
    } else {
        // Có sản phẩm tham chiếu, không thể xóa danh mục
        echo "<script>alert('Không thể xóa danh mục vì có sản phẩm tham chiếu đến nó');</script>";
    }
}

// Lấy danh sách loại sản phẩm
$rowsLoaiSP = $loaiSPModel->getAllLoaiSP();

// Hiển thị danh sách loại sản phẩm
$htmlLoaiSP = "";
$demLoaiSP = 1;
foreach ($rowsLoaiSP as $row) {
    extract($row);
    $htmlLoaiSP .= '
        <tr>
            <td>' . $demLoaiSP . '</td>
            <td>' . $tenloai . '</td>
            <td>
                <a href="?ctrl=LoaiSP&act=edit&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                <a href="?ctrl=LoaiSP&id=' . $id . '" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Xóa</a>
            </td>
        </tr>';
    $demLoaiSP++;
}
?>

<h3 class="title-page">
    Sản phẩm
</h3>

<div class="d-flex justify-content-end">
    <a href="?ctrl=LoaiSP&act=add" class="btn btn-primary mb-2">Thêm sản phẩm</a>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Thao Tác</th>
        </tr>
    </thead>
    <tbody>
        <?= $htmlLoaiSP ?>
    </tbody>
    <tfoot>
        <tr>
            <th>STT</th>
            <th>Tên Loại Sản Phẩm</th>
            <th>Thao Tác</th>
        </tr>
    </tfoot>
</table>