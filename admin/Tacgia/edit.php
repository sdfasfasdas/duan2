<?php

$ma = "";
$ten = "";
$home = 0; // Giá trị mặc định cho cột 'home'
$stt = 0; // Giá trị mặc định cho cột 'stt'

if (isset($_GET['id'])) {
    $ma = $_GET['id'];
    $row = getById_tacgia($db,$ma);
    $ten = $row['ten'];
    $home = $row['home'];
    $stt = $row['stt'];
}

// Xử lý dữ liệu khi nút "Thêm" hoặc "Sửa" được nhấn
if (isset($_POST["btnThem"]) || isset($_POST["btnSua"])) {
    $ma = $_POST["txtMa"];
    $ten = $_POST["txtTen"];
    $home = $_POST["txtHome"]; // Lấy giá trị từ trường 'home' trong biểu mẫu
    $stt = $_POST["txtStt"]; // Lấy giá trị từ trường 'stt' trong biểu mẫu
    $result = update_tacgia($db, $id, $ten, $home, $stt);


    if ($result) {
        echo "<div class='message success'>Thành công</div>";
        header("location: ?ctrl=tacgia");
    } else {
        echo "<div class='message error'>Thất bại</div>";
        header("location: ?ctrl=tacgia");
    }
}
?>
<h3 class="title-page">
    Sửa Loại Sách
</h3>
<form class="addPro" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Mã danh mục:</label>
        <input type="text" class="form-control" name="txtMa" value="<?php echo $ma; ?>" id="name"
            placeholder="Nhập tên Loại Sách" readonly>
    </div>
    <div class="form-group">
        <label for="name">Tên Loại Sách:</label>
        <input type="text" value="<?php echo $ten; ?>" class="form-control" name="txtTen" id="name"
            placeholder="Nhập tên Loại Sách" required>
    </div>
    <div class="form-group">
        <label for="categories" value="<?php echo $home; ?>">Home:</label>
        <select class="form-select" name="txtHome" aria-label="Default select example" required>
            <option value="1" <?php if ($home == 1)
                echo 'selected'; ?>>Có</option>
            <option value="0" <?php if ($home == 0)
                echo 'selected'; ?>>Không</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">STT:</label>
        <input type="number" value="<?php echo $stt; ?>" class="form-control" name="txtStt" id="name"
            placeholder="Nhập tên Loại Sách" required>
    </div>
    <div class="form-group">
        <button type="submit" name="btnSua" class="btn btn-primary">Submit</button>
    </div>
    
</form>

