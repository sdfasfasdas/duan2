<?php

class ThemLoaiSPController
{
    private $loaiSPModel;

    public function __construct($loaiSPModel)
    {
        $this->loaiSPModel = $loaiSPModel;
    }

    public function xuLyForm()
    {
        if (isset($_POST["btnThem"])) {
            // Lấy dữ liệu được nhập từ biểu mẫu
            $ten = $_POST["txtTen"];

            // Thực hiện thêm loại sản phẩm vào cơ sở dữ liệu
            $result = $this->loaiSPModel->addLoaiSP($ten);

            if ($result == false) {
                echo "<div class='message error'>Thêm thất bại</div>";
            } else {
                echo "<div class='message success'>Thêm thành công</div>";
                header("location: ?ctrl=LoaiSP");
            }
        }
    }

    public function hienThiForm()
    {
        // Hiển thị biểu mẫu thêm loại sách ở đây nếu cần thiết
    }
}

// Sử dụng
$themLoaiSPController = new ThemLoaiSPController(new LoaiSPModel($db));
$themLoaiSPController->xuLyForm();
$themLoaiSPController->hienThiForm();
?>

<h3 class="title-page">
    Thêm Loại Sách
</h3>

<form class="addPro" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên Loại Sách:</label>
        <input type="text" class="form-control" name="txtTen" id="name" placeholder="Nhập tên Loại Sách">
    </div>
    <div class="form-group">
        <button type="submit" name="btnThem" class="btn btn-primary">Submit</button>
    </div>
</form>