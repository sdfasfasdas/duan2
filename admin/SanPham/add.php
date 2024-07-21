<?php
class ThemSanPhamController
{
    private $sanPhamModel;

    public function __construct($sanPhamModel)
    {
        $this->sanPhamModel = $sanPhamModel;
    }

    public function themSanPham()
    {

        if (isset($_POST["btnThem"])) {
            $tensp = $_POST["txttensp"];
            $giaban = $_POST["txtgiaban"];
            $giathat = $_POST["txtgiathat"];
            $view = $_POST["txtview"];
            $bestseller = $_POST["txtBestseller"];
            $idloaisp = $_POST["txtidloaisp"];
            $mota = $_POST["mota"];
            $sizemax = $_POST["sizemax"];
            $sizemin = $_POST["sizemin"];
            $img = $_FILES['fileHinhAnh']['name']; // Tên gốc của file
            $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name']; // Tên tạm thời lưu trữ trên server
            $img = time() . '_' . $img; // Đổi tên file để tránh trùng lặp

            $trangthai = $_POST["trangthai"];

            // Di chuyển file đã upload vào thư mục lưu trữ hình ảnh
            move_uploaded_file($hinhanh_tmp, '../public/img/' . $img);

            $result = $this->sanPhamModel->addSanPham(
                $tensp,
                $img,
                $giaban,
                $giathat,
                $view,
                $bestseller,
                $idloaisp,
                $mota,
                $trangthai,
                $sizemax,
                $sizemin
            );

            if ($result == false) {
                echo "Thêm thất bại";
            } else {
                echo "Thêm thành công";
                header("location: ?ctrl=SanPham");
            }
        }
    }
    public function hienThiForm()
    {
        $rows_loai = $this->sanPhamModel->getAllLoaiSP();
        ?>
        <h3 class="title-page">
            Thêm sản phẩm
        </h3>

        <form class="addPro" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="txttensp" id="name" placeholder="Nhập tên sả phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" name="fileHinhAnh" class="custom-file-input" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <label for="name">View:</label>
                <input type="Number" class="form-control" name="txtview" id="name" placeholder="Nhập tên sả phẩm">
            </div>
            <div class="form-group">
                <label for="name">Bestseller:</label>
                <input type="number" class="form-control" name="txtBestseller" id="name" placeholder="Nhập tên sả phẩm">
            </div>
            <div class="form-group">
                <label for="categories">Loại Giày:</label>
                <select class="form-select" name="txtidloaisp" aria-label="Default select example">
                    <?php

                    // Hiển thị danh sách mã loại trong dropdown list
                    foreach ($rows_loai as $loai) {
                        echo "<option value=\"$loai[0]\">$loai[0] - $loai[1]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="categories">Trạng Thái:</label>
                <select class="form-select" name="trangthai" aria-label="Default select example">
                    <option selected>Chọn danh mục</option>
                    <option value="0">0 - Còn Hàng</option>
                    <option value="1">1 - Hết Hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Giá Bán:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="txtgiaban" id="price" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>
            <div class="form-group">
                <label for="price">Giá Thât:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="txtgiathat" id="price" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>
            <div class="form-group">
                <label for="price">Size Max:</label>
                <div class="input-group mb-3">
                    <input type="text" name="sizemax" id="sizemax" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>
            <div class="form-group">
                <label for="price">Size Min:</label>
                <div class="input-group mb-3">
                    <input type="text" name="sizemin" id="sizemin" class="form-control" placeholder="Nhập giá gốc">
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả ngắn</label>
                <textarea class="form-control" name="mota" rows="3" placeholder="Nhập 1 đoạn mô tả ngắn về sản phẩm"
                    style="height: 78px;"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="btnThem" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php

    }
}

$themSanPhamController = new ThemSanPhamController(new SanPhamModel($db));
$themSanPhamController->themSanPham();
$themSanPhamController->hienThiForm();
?>