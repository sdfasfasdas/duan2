<?php

if (isset($_POST["btnThem"])) {
    // Lấy dữ liệu được nhập từ biểu mẫu
    $ten = $_POST["txtTen"];

    // Thực hiện thêm loại sản phẩm vào cơ sở dữ liệu
    $result = add_Tacgia($db, $ten);

    if ($result == false) {
        echo "<div class='message error'>Thêm thất bại</div>";
    } else {
        echo "<div class='message success'>Thêm thành công</div>";
        header("location: ?ctrl=tacgia");
    }
}
?>


<h3 class="title-page">
    Thêm Tác Giả
</h3>

<form class="addPro" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Tên Tác Giả:</label>
        <input type="text" class="form-control" name="txtTen" id="name" placeholder="Nhập tên Loại Sách">
    </div>
    <div class="form-group">
        <button type="submit" name="btnThem" class="btn btn-primary">Submit</button>
    </div>
</form>