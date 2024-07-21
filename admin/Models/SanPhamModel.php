<?php
class SanPhamModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllSanPham()
    {
        $sql = "SELECT * FROM sanpham";
        return $this->db->query($sql);
    }

    public function addSanPham($tensp, $img, $giaban, $giathat, $view, $bestseller, $idloaisp, $mota, $trangthai,$sizemax,$sizemin)
    {
        $sql = "INSERT INTO sanpham (tensp, hinhanh, giaban, giathat, view, bestseller, idloaisp, mota, trangthai,sizemax,sizemin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
        $this->db->execute($sql, $tensp, $img, $giaban, $giathat, $view, $bestseller, $idloaisp, $mota, $trangthai,$sizemax,$sizemin);
        return true;
    }

    // Các phương thức khác không thay đổi

    public function getByIdSanPham($id)
    {
        $sql = "SELECT * FROM sanpham WHERE id=?";
        return $this->db->queryOne($sql, $id);
    }
    public function updateSanPham($id, $tensp, $img, $giaban, $giathat, $view, $bestseller, $idloaisp, $mota, $trangthai,$sizemax,$sizemin)
    {
        $sql = "UPDATE sanpham SET tensp=?, hinhanh=?, giaban=?, giathat=?, view=?, bestseller=?, idloaisp=?, mota=?, trangthai=?,sizemax=?,sizemin=? WHERE id=?";
        $this->db->execute($sql, $tensp, $img, $giaban, $giathat, $view, $bestseller, $idloaisp, $mota, $trangthai,$sizemax,$sizemin, $id);
        return true;
    }
    public function getAllLoaiSP()
    {
        try {
            $sql = "SELECT * FROM loaisp";
            $result = $this->db->query($sql);

            if (!is_array($result)) {
                // Nếu $result không phải là mảng, có thể xảy ra lỗi
                throw new Exception("Query failed. Result is not an array.");
            }

            return $result;
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            throw $e;
        }
    }
    // Bạn có thể thêm các phương thức và cải tiến khác dựa trên yêu cầu cụ thể
}
?>