<?php
namespace App\Models;
use App\Models\DatabaseModel;
class DonhangModel
{
    private $db;

    function __construct()
    {
        $this->db = new DatabaseModel;
    }

    function cartInsertHoang($idsp, $price, $soluong, $idbill, $size)
    {
        $sql = "INSERT INTO cart(idsp, price, soluong, idbill, size) VALUES (?, ?, ?, ?, ?)";
        $this->db->pdo_execute($sql, $idsp, $price, $soluong, $idbill, $size);
    }

    function userInsert2($tendn, $pass, $ten, $diachi, $dienthoai, $email)
    {
        $sql = "INSERT INTO user(tendn, pass, ten, diachi, dienthoai, email) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->pdo_execute_id($sql, $tendn, $pass, $ten, $diachi, $dienthoai, $email);
    }

    function getTongDonHang($giohang)
    {
        $tong = 0;
        foreach ($giohang as $sp) {
            extract($sp);
            $tt = (int) $price * (int) $soluong;
            $tong += $tt;
        }
        return $tong;
    }

    function billInsertId($madh, $iduser, $ten, $diachi, $dienthoai, $nguoinhan, $nguoinhan_sdt, $nguoinhan_diachi, $email, $pttt, $voucher, $tongthanhtoan, $ngaydat)
    {
        $sql = "INSERT INTO bill(mahd, iduser, ten, diachi, dienthoai, nguoinhan, nguoinhan_sdt, nguoinhan_diachi, email, pttt, voucher, tongthanhtoan, ngay) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->pdo_execute_id($sql, $madh, $iduser, $ten, $diachi, $dienthoai, $nguoinhan, $nguoinhan_sdt, $nguoinhan_diachi, $email, $pttt, $voucher, $tongthanhtoan, $ngaydat);
    }

    function insertOrderDetails($idbill)
    {
        foreach ($_SESSION['giohang'] as $sp) {
            $idsp = $sp['id'];
            $price = $sp['price'];
            $soluong = $sp['soluong'];
            $size = $sp['size'];
            $this->cartInsertHoang($idsp, $price, $soluong, $idbill, $size);
           
        }

    }
}