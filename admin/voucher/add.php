<div id="container_ad">
    <?php
    // include_once("../model/sanpham.php");
    // include_once("../test/connect.php");
    
    if (isset($_POST["btnThem"])) {
        $voucher = $_POST["txtvoucher"];
        $giatri = $_POST["txtgiatri"];
        $result = addVoucher($db, $voucher, $giatri);
        if ($result == false) {
            echo "Thêm thất bại";
        } else {
            echo "Thêm thành công";
            header("location: ?ctrl=voucher");
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Tên sản phẩm: <input type="text" name="txtvoucher"><br>
        Giá: <input type="text" name="txtgiatri"><br>
        <input type="submit" name="btnThem" value="Thêm">
    </form>
    <button onclick="goBack()">Quay lại</button>
</div>