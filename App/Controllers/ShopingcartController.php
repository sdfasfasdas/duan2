<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\DonhangModel;

class ShopingcartController extends BaseController
{
    private $ProductModel;
    private $DonhangModel;

    function __construct()
    {
        $this->ProductModel = new ProductModel;
        $this->DonhangModel = new DonhangModel;
    }

    function index()
    {
        if (isset($_POST['addcart'])) {
            $idkh = $_POST['idkh'];
            $name = $_POST['name'];
            $id = $_POST['id'];
            $img = $_POST['img'];
            $price = $_POST['price'];
            $soluong = $_POST['soluong'];
            $size = $_POST['size'];
            $tt = (int) $price * (int) $soluong;
            $sp = array("name" => $name, "img" => $img, "price" => $price, "soluong" => $soluong, "id" => $id, "tt" => $tt, "size" => $size);


            if (!isset($_SESSION['giohang'])) {
                $_SESSION['giohang'] = array();
            }

            $product_exists = false;

            // Kiểm tra xem $_SESSION['giohang'] có là mảng không
            if (is_array($_SESSION['giohang'])) {
                foreach ($_SESSION['giohang'] as $key => $cart_item) {
                    if ($cart_item['id'] === $id && $cart_item['size'] === $size) {
                        $product_exists = true;

                        $_SESSION['giohang'][$key]['soluong'] += $soluong;
                        break;
                    }
                }
            } else {
                $_SESSION['giohang'] = array();
            }

            if (!$product_exists) {
                array_push($_SESSION['giohang'], $sp);
            }
        }
        if (isset($_GET['del']) && ($_GET['del'] == 1)) {
            unset($_SESSION["giohang"]);
            header('location: index.php');
        } else {
            if (isset($_SESSION['giohang'])) {
                $tongdonhang = $this->DonhangModel->getTongDonHang($_SESSION['giohang']);
            }
            $formatted_price4 = number_format($tongdonhang, 0, '.', ',');
            $giatrivoucher = 0;
            if (isset($_GET['voucher']) && ($_GET['voucher'] == 1)) {
                if (isset($_SESSION['voucher_sieuto']) && ($_SESSION['voucher_sieuto'] > 0)) {
                    unset($_SESSION['voucher_sieuto']);
                    $voucher = $_POST['mavoucher'];
                    $giagia = 0;
                    $_SESSION['voucher_sieuto'] = $giagia;
                } else {
                    $voucher = $_POST['mavoucher'];
                    $giagia = 0;
                    $_SESSION['voucher_sieuto'] = $giagia;
                }
                $giatrivoucher = $_SESSION['voucher_sieuto']['giatri'];
            }


            $thanhtoan = $tongdonhang - $giatrivoucher;
        }
        $formatted_pricett = number_format($thanhtoan, 0, '.', ',');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id_to_delete'])) {
            $product_id_to_delete = $_POST['product_id_to_delete'];
            foreach ($_SESSION['giohang'] as $key => $cart_item) {
                if ($cart_item['id'] == $product_id_to_delete) {
                    unset($_SESSION['giohang'][$key]);
                    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
                    break;
                }
            }
            header("location: index.php?pg=addcart");
        }
        if (isset($_GET['ttt']) && ($_GET['ttt'] == 1)) {
            if (isset($_POST['btnSuasl'])) {
                $soluong = $_POST['soluong'];
                if ($soluong > 0) {
                    $sodem = $_POST['product_id_to_update'] - 1;
                    $_SESSION['giohang'][$sodem]['soluong'] = $soluong;
                }
            }
            header("location: index.php?pg=viewcart");
        }
        $this->renderView("shopingcart", $this->titlepage, $this->data);
    }
}
