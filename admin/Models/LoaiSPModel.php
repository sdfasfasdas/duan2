<?php

class LoaiSPModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
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

    public function addLoaiSP($ten)
    {
        try {
            $sql = "INSERT INTO loaisp (tenloai) VALUES (?)";
            $this->db->execute($sql, $ten);
            return true;
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            throw $e;
        }
    }

    public function updateLoaiSP($id, $ten)
    {
        try {
            $sql = "UPDATE loaisp SET tenloai = ? WHERE id = ?";
            $result = $this->db->execute($sql, $ten, $id);
            return $result;
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            throw $e;
        }
    }

    public function deleteLoaiSP($ma)
    {
        $sql = "DELETE FROM loaisp WHERE id = ?";
        $result = $this->db->execute($sql, $ma);
        return $result;
    }

    public function getByIdLoaiSP($ma)
    {
        try {
            $sql = "SELECT * FROM loaisp WHERE id = ?";
            $result = $this->db->queryOne($sql, $ma);
            return $result;
        } catch (Exception $e) {
            // Xử lý ngoại lệ nếu có
            throw $e;
        }
    }
    public function countSanPhamByDanhMuc($ma)
    {
        try {
            $sql = "SELECT COUNT(*) FROM sanpham WHERE idloaisp = ?";
            $result = $this->db->queryValue($sql, [$ma]); // Truyền mảng tham số vào hàm queryValue
            return $result;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>
