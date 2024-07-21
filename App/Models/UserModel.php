<?php

namespace App\Models;

class UserModel
{
    private $db;

    public function __construct(DatabaseModel $databaseModel)
    {
        $this->db = $databaseModel;
    }
    function isValidPhoneNumber($phoneNumber)
    {

        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);


        if (strlen($phoneNumber) == 10 || strlen($phoneNumber) == 11) {

            if (preg_match('/^(84|\+84|0)(3[2-9]|5[689]|7[06-9]|8[1-9]|9\d)\d{7}$/', $phoneNumber)) {
                return true;
            }
        }

        return false;
    }
    function isValidUsername($username)
    {
        // Kiểm tra độ dài tên đăng nhập
        if (strlen($username) >= 6 && strlen($username) <= 20) {
            // Kiểm tra định dạng tên đăng nhập (chỉ chấp nhận chữ, số và dấu gạch dưới)
            if (preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
                return true;
            }
        }

        return false;
    }

    public function checkUserCredentials($username, $password)
    {
        $sql = "SELECT * FROM user WHERE tendn = ? AND pass = ?";
        return $this->db->get_one($sql, $username, $password);
    }
    public function insertUser($tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role)
    {
        $sql = "INSERT INTO user(tendn, pass, ten, hinhanh, diachi, dienthoai, email, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->pdo_execute($sql, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role);
    }
    public function userExist($id)
    {
        $sql = "SELECT count(*) FROM user WHERE id=?";
        return $this->db->pdo_query_value($sql, $id) > 0;
    }
}
