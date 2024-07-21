<div id="container_ad">
    <?php
    // include_once("../model/sanpham.php");
    // include_once("../test/connect.php");
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $row = getById_SanPham($db, $id);
        $voucher = $row['voucher'];
        $giatri = $row['giatri'];

    }

    if (isset($_POST['btnSua'])) {
        $voucher = $_POST["txtvoucher"];
        $giatri = $_POST["txtgiatri"];


        $result = updateVoucher($db, $id, $voucher, $giatri);
        if ($result) {
            echo "Sửa thành công";


            header("location: ?ctrl=voucher");
        } else {
            echo "Sửa thất bại";
        }
    }

    ?>

    
        Mã sản phẩm: <input type="text" value="<?php echo $id; ?>"><br>
        Tên sản phẩm: <input type="text" value="<?php echo $voucher; ?>" name="txtvoucher"><br>
        Giá: <input type="text" value="<?php echo $price; ?>" name="txtgiatri"><br>
       

        <input type="submit" name="btnSua" value="Sửa">
    </form>


</div>