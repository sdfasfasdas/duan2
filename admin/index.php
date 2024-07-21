<?php
// session_start();
// ob_start();
// if (isset($_SESSION['user_adm']) && (count($_SESSION['user_adm']) > 0) && (is_array($_SESSION['user_adm']))) {
//     $admin = $_SESSION['user_adm'];
// } else {
//     header('location: login.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">

        <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="?ctrl=trangchu"><i class="fa-solid fa-house ico-side"></i>Trang thống kê</a>
                    </li>
                    <li>
                        <a href="?ctrl=donhang"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản kí đơn hàng</a>
                    </li>
                    <li>
                        <a href="?ctrl=LoaiSP"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí danh muc</a>
                    </li>
                    <li>
                        <a href="?ctrl=sanpham"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản phẩm</a>
                    </li>
                    <li>
                        <a href="?ctrl=khachhang"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
                    </li>
                    <li>
                        <a href="?ctrl=tacgia"><i class="fa-solid fa-at ico-side"></i>Quản lí tác giả </a>
                    </li>
                    <li>
                        <a href="?ctrl=dangxuat"><i class="fa-solid fa-right-from-bracket ico-side"></i>Đăng Xuất </a>
                    </li>

                </ul>
            </nav>
            <div class="main-content">
                <a href="javascript:void(0);" class="back-button" onclick="goBack()">Quay lại</a>
                <div id="container_ad">

                    <div class="heading">Quản Lý Voucher</div>
                    <table>
                        <tr>
                            <th>Mã Voucher</th>
                            <th>Voucher</th>
                            <th>Giá Trị</th>

                            <th><a href="?ctrl=voucher&act=add" style="color: white;text-decoration: none;">Thêm sản
                                    phẩm</a></th>
                        </tr>
                        <?php
                        foreach ($rows_sp as $row) {
                            echo ("<tr>
                <td>{$row[0]}</td>
                <td>{$row[1]}</td>
                <td>{$row[2]}</td>
                <td>
                    <a href='?ctrl=SanPham&act=edit&id={$row[0]}'>Sửa</a>
                    <a href='?ctrl=SanPham&id={$row[0]}' onclick='return confirmDelete()'>Xóa</a>
                </td>
            </tr>");
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    <script>
        new DataTable('#example');
        function goBack() {
            window.history.back();
        }
    </script>


</body>

</html>