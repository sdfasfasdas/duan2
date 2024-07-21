<?php

class SanPhamController
{
    private $sanPhamModel;

    public function __construct($sanPhamModel)
    {
        $this->sanPhamModel = $sanPhamModel;
    }

    public function xuLyAn($id)
    {
        $this->sanPhamModel->updateAn($id);
    }

    public function xuLyHien($id)
    {
        $this->sanPhamModel->updateHien($id);
    }

    public function hienThiDanhSach()
    {
        $rows_sp = $this->sanPhamModel->getAllSanPham();
        $demsp = 1;
        $html_sp = "";

        foreach ($rows_sp as $row) {
            extract($row);
            $shortText = substr($mota, 0, 100);

            if (strlen($mota) > 100) {
                $shortText .= '...';
            }


            $html_sp .= '<tr>
                <th>' . $demsp . '</th>
                <th>' . $tensp . '</th>
                <th><img src="../public/img/' . $hinhanh . '" width="50" height="80"></th>
                <th>' . $view . '</th>
                <th>' . $bestseller . '</th>
                <th>' . $giaban . '</th>
                <th>' . $giathat . '</th>
                <th style="width: 140px;">' . $shortText . '</th>
                <th>' . $trangthai . '</th>
                <th>' . $idloaisp . '</th>
                <th>' . $sizemax . '</th>
                <th>' . $sizemin . '</th>
                <th>
                <a style="width: 80px;" href="?ctrl=sanpham&act=edit&id=' . $id . '" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                <a href="?ctrl=sanpham&id=' . $id . '&hien" class="btn btn-danger"><i class="fa-duotone fa-circle-xmark"></i> Hiện</a></th>
            </tr>';
            $demsp++;

        }

        return $html_sp;
    }
}

class SanPhamView
{
    public function hienThiDanhSach($html_sp)
    {
        echo '<h3 class="title-page">Quản Lý Sản Phẩm</h3>
            <div class="d-flex justify-content-end">
                <a href="?ctrl=sanpham&act=add" class="btn btn-primary mb-2">Thêm sản phẩm</a>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>View</th>
                        <th>Bestseller</th>
                        <th>Giá Bán</th>
                        <th>Giá Chưa Giảm</th>
                        <th>Mô Tả</th>
                        <th>Trạng Thái</th>
                        <th>Danh Mục</th>
                        <th>Size Max</th>
                        <th>Size Min</th>
                        <th style="width:150px;">Thao Tác</th>
                    </tr>
                </thead>
                <tbody>';
        echo $html_sp;
        echo '</tbody>
            <tfoot>
                <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>View</th>
                <th>Bestseller</th>
                <th>Giá Bán</th>
                <th>Giá Chưa Giảm</th>
                <th>Mô Tả</th>
                <th>Trạng Thái</th>
                <th>Danh Mục</th>
                <th style="width:150px;">Thao Tác</th>
                </tr>
            </tfoot>
        </table>';
    }
}

// Sử dụng
$sanPhamModel = new SanPhamModel($db);
$sanPhamController = new SanPhamController($sanPhamModel);
$sanPhamView = new SanPhamView();

// Xử lý logic và hiển thị giao diện
if (isset($_GET["an"])) {
    $id = $_GET["id"];
    $sanPhamController->xuLyAn($id);
}
if (isset($_GET["hien"])) {
    $id = $_GET["id"];
    $sanPhamController->xuLyHien($id);
}

$html_sp = $sanPhamController->hienThiDanhSach();
$sanPhamView->hienThiDanhSach($html_sp);
?>