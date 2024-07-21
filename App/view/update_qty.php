<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["stt"]) && isset($_POST["newQty"])) {
    $stt = $_POST["stt"];
    $newQty = (int)$_POST["newQty"];

    // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng
    if (isset($_SESSION['giohang'][$stt])) {
        // Cập nhật số lượng sản phẩm
        $_SESSION['giohang'][$stt]['soluong'] = $newQty;

        // Trả về phản hồi JSON
        echo json_encode(["success" => true, "message" => "Cập nhật số lượng thành công."]);
    } else {
        // Trả về phản hồi JSON nếu sản phẩm không tồn tại
        echo json_encode(["success" => false, "message" => "Sản phẩm không tồn tại trong giỏ hàng."]);
    }
} else {
    // Trả về phản hồi JSON nếu không có dữ liệu POST
    echo json_encode(["success" => false, "message" => "Yêu cầu không hợp lệ."]);
}
?>