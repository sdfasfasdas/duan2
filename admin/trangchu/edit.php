<?php
function getById_billbill($db, $id)
{
    $sql = "select * from bill where id=$id";
    $result = $db->query($sql);
    $row = $result->fetch();
    return $row;
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $billl = getById_billbill($db, $id);
}
if (isset($_POST["btnSua"])) {
    $id = $_POST["mahd"];
    $trangthai = $_POST["trangthai"];
    $result = update_bill($db, $id, $trangthai);


    if ($result) {
        if (isset($_GET['dh']) && ($_GET['dh'] == 1)) {
            header("location: ?ctrl=donhang");
        } else {
            echo "<div class='message success'>Thành công</div>";
            header("location: ?ctrl=trangchu");
        }
    } else {
        echo "<div class='message error'>Thất bại</div>";
        header("location: ?ctrl=trangchu");
    }
}
?>

<h3 class="title-page">
    Thay Đổi Trạng Thái Đơn Hàng
</h3>

<form class="addPro" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Mã Bill:</label>
        <input type="text" class="form-control" name="mahd" id="name" value="<?= $id ?>" readonly>
    </div>
    <div class="form-group">
        <label for="categories">Trạng Thái:</label>
        <select class="form-select" name="trangthai" aria-label="Default select example">
            <option value="<?= $billl['trangthai'] ?>">Trạng Thái Hiện Tại:
                <?= $billl['trangthai'] ?>
            </option>
            <option value="Chờ xác nhận">Chờ xác nhận</option>
            <option value="Đã xác nhận">Đã xác nhận</option>
            <option value="Đang xử lý">Đang xử lý</option>
            <option value="Đã gửi">Đã gửi</option>
            <option value="Đã nhận">Đã nhận</option>
            <option value="Đã hủy">Đã hủy</option>
            <option value="Đã hoàn trả">Đã hoàn trả</option>
            <option value="Giao hàng thất bại">Giao hàng thất bại</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" name="btnSua" class="btn btn-primary">Submit</button>
    </div>
</form>