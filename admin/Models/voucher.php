<?php

function getAllVouchers($db)
{
    $sql = "SELECT * FROM voucher";
    $result = $db->query($sql);
    $rows = $result->fetchAll();
    return $rows;
}

function addVoucher($db, $voucher, $giatri)
{
    $sql = "INSERT INTO voucher (voucher, giatri) VALUES (:voucher, :giatri)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':voucher', $voucher);
    $stmt->bindParam(':giatri', $giatri);
    $result = $stmt->execute();
    return $result;
}

function updateVoucher($db, $id, $voucher, $giatri)
{
    $sql = "UPDATE voucher SET voucher=:voucher, giatri=:giatri WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':voucher', $voucher);
    $stmt->bindParam(':giatri', $giatri);
    $stmt->bindParam(':id', $id);

    $result = $stmt->execute();
    return $result;
}

?>