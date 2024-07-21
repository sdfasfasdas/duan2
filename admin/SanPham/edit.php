<?php

class EditSanPham {
    private $sanPhamModel;
    private $id;
    private $tensp;
    private $img;
    private $view;
    private $bestseller;
    private $giaban;
    private $giathat;
    private $mota;
    private $trangthai;
    private $idloaisp;

    public function __construct($sanPhamModel) {
        $this->sanPhamModel = $sanPhamModel;
        $this->id = "";
        $this->tensp = "";
        $this->img = "";
        $this->view = "";
        $this->bestseller = "";
        $this->giaban = "";
        $this->giathat = "";
        $this->mota = "";
        $this->trangthai = "";
        $this->idloaisp = "";
    }

    public function xuLyForm() {
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
            $row = $this->sanPhamModel->getByIdSanPham($this->id);
            $this->tensp = $row['tensp'];
            $this->img = $row['hinhanh'];
            $this->view = $row['view'];
            $this->bestseller = $row['bestseller'];
            $this->giaban = $row['giaban'];
            $this->giathat = $row['giathat'];
            $this->mota = $row['mota'];
            $this->trangthai = $row['trangthai'];
            $this->idloaisp = $row['idloaisp'];
        }

        if (isset($_POST['btnSua'])) {
            $this->id = $_GET['id'];
            $this->tensp = $_POST["txttensp"];
            $this->view = $_POST["txtview"];
            $this->bestseller = $_POST["txtBestseller"];
            $this->giaban = $_POST["txtgiaban"];
            $this->giathat = $_POST["txtgiathat"];
            $this->mota = $_POST["mota"];
            $this->img = $_FILES['fileHinhAnh'];
            $this->idloaisp = $_POST['txtidloaisp'];
            $this->trangthai = $_POST['trangthai'];
            $this->sizemax = $_POST["sizemax"];
            $this->sizemin = $_POST["sizemin"];
            if ($_FILES['fileHinhAnh']['error'] === UPLOAD_ERR_OK) {
                $this->img = $_FILES['fileHinhAnh']['name'];
                $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name'];
                $this->img = time() . '_' . $this->img;

                move_uploaded_file($hinhanh_tmp, '../public/img/' . $this->img);
            } else {
                $this->img = $row['hinhanh'];
            }

            $result = $this->sanPhamModel->updateSanPham($this->id, $this->tensp, $this->img, $this->giaban, $this->giathat, $this->view, $this->bestseller, $this->idloaisp, $this->mota, $this->trangthai, $this->sizemax,
            $this->sizemin);
            if ($result) {
                echo "Sửa thành công";
                header("location: ?ctrl=SanPham");
            } else {
                echo "Sửa thất bại";
            }
        }
    }

    public function hienThiForm() {
        $rows_loai = $this->sanPhamModel->getAllLoaiSP();
        ?>
        <h3 class="title-page">
            Sửa Sản Phẩm
        </h3>
        <form class="addPro" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="txttensp" value="<?php echo $this->tensp; ?>"
                    placeholder="Nhập tên sả phẩm">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Ảnh sản phẩm</label>
                <div class="custom-file">
                    <input type="file" name="fileHinhAnh" class="custom-file-input" id="exampleInputFile">
                </div>
            </div>
            <div class="form-group">
                <label for="name">View:</label>
                <input type="Number" class="form-control" name="txtview" value="<?php echo $this->view; ?>"
                    placeholder="Nhập số lần xem">
            </div>
            <div class="form-group">
                <label for="name">Bestseller:</label>
                <input type="number" class="form-control" name="txtBestseller" value="<?php echo $this->bestseller; ?>"
                    placeholder="Nhập số lần bán chạy">
            </div>
            <div class="form-group">
                <label for="categories">Loại Sách:</label>
                <select class="form-select" name="txtidloaisp" aria-label="Default select example">
                    <?php
                    foreach ($rows_loai as $loai) {
                        $selected = ($loai[0] == $this->idloaisp) ? 'selected' : '';
                        echo "<option value=\"$loai[0]\" $selected>$loai[0] - $loai[1]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="categories">Trạng Thái:</label>
                <select class="form-select" name="trangthai" aria-label="Default select example">
                    <option <?php if ($this->trangthai == '1')
                        echo 'selected'; ?> value="0">0-Còn Hàng</option>
                    <option <?php if ($this->trangthai == '0')
                        echo 'selected'; ?> value="1">1-Hết Hàng</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Giá Bán:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="txtgiaban" value="<?php echo $this->giaban; ?>" class="form-control"
                        placeholder="Nhập giá bán">
                </div>
            </div>
            <div class="form-group">
                <label for="price">Giá Thật:</label>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="txtgiathat" value="<?php echo $this->giathat; ?>" class="form-control"
                        placeholder="Nhập giá bán">
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
                    style="height: 78px;"><?php echo $this->mota; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="btnSua" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
    }
}

// Sử dụng
$sanPhamModel = new SanPhamModel($db);
$sanPhamController = new EditSanPham($sanPhamModel);
$sanPhamController->xuLyForm();
$sanPhamController->hienThiForm();
?>