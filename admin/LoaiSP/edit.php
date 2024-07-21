<?php

class EditLoaiSP {
    private $loaiSPModel;
    private $ma;
    private $ten;

    public function __construct($loaiSPModel) {
        $this->loaiSPModel = $loaiSPModel;
        $this->ma = "";
        $this->ten = "";
    }

    public function xuLyForm() {
        if (isset($_GET['id'])) {
            $this->ma = $_GET['id'];
            $row = $this->loaiSPModel->getByIdLoaiSP($this->ma);
            $this->ten = $row['tenloai'];

            // Lấy thêm các thông tin khác nếu cần
        }

        if (isset($_POST["btnSua"])) {
            $this->ma = $_POST["txtMa"];
            $this->ten = $_POST["txtTen"];
            $result = $this->loaiSPModel->updateLoaiSP($this->ma, $this->ten);

            if ($result) {
                echo "<div class='message success'>Thành công</div>";
                // Chuyển hướng người dùng sau khi xử lý form
                header("location: ?ctrl=LoaiSP");
                exit(); // Chắc chắn dừng chương trình sau khi chuyển hướng
            } else {
                echo "<div class='message error'>Thất bại</div>";
                header("location: ?ctrl=LoaiSP");
            }
        }
    }

    public function hienThiForm() {
        ?>
        <h3 class="title-page">
            Sửa Loại Sách
        </h3>
        <form class="addPro" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Mã danh mục:</label>
                <input type="text" class="form-control" name="txtMa" value="<?php echo $this->ma; ?>" id="name" placeholder="Nhập tên Loại Sách" readonly>
            </div>
            <div class="form-group">
                <label for="name">Tên Loại Sách:</label>
                <input type="text" value="<?php echo $this->ten; ?>" class="form-control" name="txtTen" id="name" placeholder="Nhập tên Loại Sách" required>
            </div>

            <div class="form-group">
                <button type="submit" name="btnSua" class="btn btn-primary">Submit</button>
            </div>
        </form>
        <?php
    }
}

// Sử dụng
$loaiSPModel = new LoaiSPModel($db);
$loaiSPController = new EditLoaiSP($loaiSPModel);
$loaiSPController->xuLyForm();
$loaiSPController->hienThiForm();
?>