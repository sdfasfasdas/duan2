<?php
require_once 'pdo.php';

function user_insert($id, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role){
    $sql = "INSERT INTO user(id, tendn, pass, ten, hinhanh, diachi, dienthoai, email, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $id, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role);
}

function user_update($id, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role, $gioitinh){
    $sql = "UPDATE user SET tendn=?, pass=?, ten=?, hinhanh=?, diachi=?, dienthoai=?, email=?, role=?, gioitinh=? WHERE id=?";
    pdo_execute($sql, $tendn, $pass, $ten, $hinhanh, $diachi, $dienthoai, $email, $role,$gioitinh, $id);
}

function user_delete($id){
    $sql = "DELETE FROM user WHERE id=?";
    if(is_array($id)){
        foreach ($id as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $id);
    }
}

function user_select_all(){
    $sql = "SELECT * FROM user";
    return pdo_query($sql);
}

function user_select_by_id($id){
    $sql = "SELECT * FROM user WHERE id=?";
    return pdo_query_one($sql, $id);
}

function user_exist($id){
    $sql = "SELECT count(*) FROM user WHERE id=?";
    return pdo_query_value($sql, $id) > 0;
}

function user_select_by_role($role){
    $sql = "SELECT * FROM user WHERE role=?";
    return pdo_query($sql, $role);
}

function user_change_password($id, $new_password){
    $sql = "UPDATE user SET pass=? WHERE id=?";
    pdo_execute($sql, $new_password, $id);
}
function check_out($tendn, $pass)
{
    $sql = "SELECT * FROM user WHERE tendn = ? and pass = ?";
    return pdo_query_one($sql, $tendn, $pass);
}

?>