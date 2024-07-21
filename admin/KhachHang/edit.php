<?php


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = user_select_by_id($id);
    $tendn = $row['tendn']; // Updated to use column names
    $pass = $row['pass']; // Updated to use column names
    $ten = $row['ten']; // Updated to use column names
    $hinhanh = $row['hinhanh']; // Updated to use column names
    $diachi = $row['diachi']; // Updated to use column names
    $dienthoai = $row['dienthoai']; // Updated to use column names
    $email = $row['email']; // Updated to use column names
    $role = $row['role'];
    $gioitinh = $row['gioitinh']; // Updated to use column names
}

if (isset($_POST['btnSua'])) {
    $tendn = $_POST['txtTendn'];
    $pass = $_POST['txtPass'];
    $ten = $_POST['txtTen'];

    // Image handling remains the same
    if ($_FILES['fileHinhAnh']['error'] === UPLOAD_ERR_OK) {
        $hinhanh = $_FILES['fileHinhAnh']['name'];
        $hinhanh_tmp = $_FILES['fileHinhAnh']['tmp_name'];
        $hinhanh = time() . '_' . $hinhanh;
        move_uploaded_file($hinhanh_tmp, '../view/images/' . $hinhanh);
    } else {
        $hinhanh = $row['hinhanh']; // Keep the existing image name
    }

    $diachi = $_POST['txtDiaChi'];
    $dienthoai = $_POST['txtSoDienThoai'];
    $email = $_POST['txtEmail'];
    $role = $_POST['txtRole'];
    $gioitinh = $_POST['txtGioiTinh'];

    // Updated to use the user_update function
    $result = user_update($id, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role, $gioitinh);

    if ($result) {
        echo "Cập nhật thông tin khách hàng thành công";
        header("location: ?ctrl=KhachHang");
    } else {
        echo "Cập nhật thông tin khách hàng thành công";
        header("location: ?ctrl=KhachHang");
    }
}
?>



<h3 class="title-page">Sửa Thông Tin Khách Hàng</h3>

<form class="addPro" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="txtMaND">Mã khách hàng:</label>
        <input type="text" class="form-control" name="txtMaND" id="txtMaND" placeholder="Nhập mã khách hàng" readonly
            value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
        <label for="txtTendn">Tên đăng nhập:</label>
        <input type="text" class="form-control" name="txtTendn" id="txtTenDN" placeholder="Nhập tên đăng nhập"
            value="<?php echo $tendn; ?>" required>
    </div>
    <div class="form-group">
        <label for="txtMatKhau">Mật khẩu:</label>
        <input type="password" class="form-control" name="txtPass" id="txtMatKhau" placeholder="Nhập mật khẩu"
            value="<?php echo $pass; ?>" required>
        <input type="checkbox" id="chkMatKhau" onclick="showHidePass()">
        <label for="chkMatKhau">Hiển thị mật khẩu</label>
    </div>
    <div class="form-group">
        <label for="txtTenKH">Họ và tên:</label>
        <input type="text" class="form-control" name="txtTen" id="txtTenKH" placeholder="Nhập họ và tên"
            value="<?php echo $ten; ?>" required>
    </div>
    <div class="form-group">
        <label for="fileHinhAnh">Hình ảnh đại diện:</label>
        <input type="file" class="form-control" name="fileHinhAnh" id="fileHinhAnh" value="<?php echo $hinhanh; ?>">
    </div>
    <div class="form-group">
        <label for="txtDiaChi">Địa chỉ:</label>
        <input type="text" class="form-control" name="txtDiaChi" id="txtDiaChi" placeholder="Nhập địa chỉ"
            value="<?php echo $diachi; ?>" required>
    </div>
    <div class="form-group">
        <label for="txtSoDienThoai">Số điện thoại:</label>
        <input type="text" class="form-control" name="txtSoDienThoai" id="txtSoDienThoai"
            placeholder="Nhập số điện thoại" value="<?php echo $dienthoai; ?>" required>
    </div>
    <div class="form-group">
        <label for="txtEmail">Email:</label>
        <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Nhập email"
            value="<?php echo $email; ?>" required>
    </div>
    <div class="form-group">
        <label for="txtRole">Vai trò:</label>
        <select class="form-select" name="txtRole" id="txtRole" required>
            <option value="1" <?php if ($role === '1')
                echo 'selected'; ?>>Quản trị viên</option>
            <option value="0" <?php if ($role === '0')
                echo 'selected'; ?>>Người dùng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="txtGioiTinh">Giới tính:</label>
        <select class="form-select" name="txtGioiTinh" id="txtGioiTinh" required>
            <option value="nam" <?php if ($gioitinh === 'nam')
                echo 'selected'; ?>>Nam</option>
            <option value="nu" <?php if ($gioitinh === 'nu')
                echo 'selected'; ?>>Nữ</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" name="btnSua" class="btn btn-primary">Lưu thay đổi</button>
    </div>
</form>
<script>
    function showHidePass() {
        var txtMatKhau = document.getElementById("txtMatKhau");
        if (txtMatKhau.type === "password") {
            txtMatKhau.type = "text";
        } else {
            txtMatKhau.type = "password";
        }
    }
</script>