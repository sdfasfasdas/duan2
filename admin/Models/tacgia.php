
<?php
//them loai sp
// xoa loai sp
//show tat ca loai sp
function getAll_tacgia($db){
    #code
    $sql="select* from tacgia";
    $result=$db->query($sql);
    $rows=$result->fetchAll();
    return $rows;
}

function add_tacgia($db, $ten){
    $sql = "INSERT INTO tacgia (name, home, stt) VALUES ('$ten', 0, 0)";
    $result = $db->exec($sql);
    return $result;
}
function update_tacgia($db, $id, $ten, $home, $stt){
    $sql = "UPDATE tacgia SET name = '$ten', home = $home, stt = $stt WHERE id = $id";
    $result = $db->exec($sql);
    return $result;
}
function delete_tacgia($db,$ma){
    $sql="delete tacgia set where id=$ma";
    $result=$db->exec($sql);
    return $result;
}
//sua lai du lieu trong bang loaisp

//lay loai sp theo id
function getById_LoaiSP($db,$ma){
    $sql="select * from danhmuc where id=$ma";
        $result=$db->query($sql);
        $row=$result->fetch();
        return $row;
}


