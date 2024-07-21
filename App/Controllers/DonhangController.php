<?php
namespace App\Controllers;
use App\Models\DonHangModel;
use App\Controllers\BaseController;


class DonhangController extends BaseController
{
    private $donhang;
    function __construct()
    {
        $this->donhang = new DonhangModel;
    }
    function index()
    {
        $this->renderView("donhang", $this->titlepage, $this->data);
    }
    function xuly()
    {
        if (isset($_POST['dathang'])) {
            if (empty($_POST['hoten']) || empty($_POST['diachi']) || empty($_POST['email']) || empty($_POST['dienthoai'])) {
                $_SESSION['ttnt'] = "Bạn chưa điền đầy đủ thông tin";
                header('Location: index.php?pg=donhang');
            } else {
                $ten = $_POST['hoten'];
                $diachi = $_POST['diachi'];
                $email = $_POST['email'];
                $dienthoai = $_POST['dienthoai'];
                $nguoinhan = $_POST['hoten_nguoinhan'];
                $diachi_nguoinhan = $_POST['diachi_nguoinhan'];
                $dienthoai_nguoinhan = $_POST['dienthoai_nguoinhan'];
                $pttt = $_POST['pttt'];
                $tongthanhtoan = $this->donhang->getTongDonHang($_SESSION['giohang']);
            }

            if ($pttt === 'VNPAY') {
                // $tongh = $tongthanhtoan;
                // error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                // date_default_timezone_set('Asia/Ho_Chi_Minh');

                // $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                // $vnp_Returnurl = "https://localhost/php1/assmphp2/public/index.php?pg=donhang";
                // $vnp_TmnCode = "W4LRPITL"; //Mã website tại VNPAY 
                // $vnp_HashSecret = "AKJJGTVEXAFNBQPPDMOZLSHHSXXKUDEN"; //Chuỗi bí mật

                // $vnp_TxnRef = rand(00, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                // $vnp_OrderInfo = "noi dung";
                // $vnp_OrderType = "bill";
                // $vnp_Amount = $tongh * 100;
                // $vnp_Locale = 'vn';
                // $vnp_BankCode = 'NCB';
                // $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //127.0.0.1

                // $inputData = array(
                //     "vnp_Version" => "2.1.0",
                //     "vnp_TmnCode" => $vnp_TmnCode,
                //     "vnp_Amount" => $vnp_Amount,
                //     "vnp_Command" => "pay",
                //     "vnp_CreateDate" => date('YmdHis'),
                //     "vnp_CurrCode" => "VND",
                //     "vnp_IpAddr" => $vnp_IpAddr,
                //     "vnp_Locale" => $vnp_Locale,
                //     "vnp_OrderInfo" => $vnp_OrderInfo,
                //     "vnp_OrderType" => $vnp_OrderType,
                //     "vnp_ReturnUrl" => $vnp_Returnurl,
                //     "vnp_TxnRef" => $vnp_TxnRef,
                //     // "vnp_ExpireDate" => $vnp_ExpireDate,

                //     // "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
                //     // "vnp_Bill_Email" => $vnp_Bill_Email,
                //     // "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
                //     // "vnp_Bill_LastName" => $vnp_Bill_LastName,
                //     // "vnp_Bill_Address" => $vnp_Bill_Address,
                //     // "vnp_Bill_City" => $vnp_Bill_City,
                //     // "vnp_Bill_Country" => $vnp_Bill_Country,
                //     // "vnp_Inv_Phone" => $vnp_Inv_Phone,
                //     // "vnp_Inv_Email" => $vnp_Inv_Email,
                //     // "vnp_Inv_Customer" => $vnp_Inv_Customer,
                //     // "vnp_Inv_Address" => $vnp_Inv_Address,
                //     // "vnp_Inv_Company" => $vnp_Inv_Company,
                //     // "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
                //     // "vnp_Inv_Type" => $vnp_Inv_Type
                // );

                // if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                //     $inputData['vnp_BankCode'] = $vnp_BankCode;
                // }


                // //var_dump($inputData);
                // ksort($inputData);
                // $query = "";
                // $i = 0;
                // $hashdata = "";
                // foreach ($inputData as $key => $value) {
                //     if ($i == 1) {
                //         $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                //     } else {
                //         $hashdata .= urlencode($key) . "=" . urlencode($value);
                //         $i = 1;
                //     }
                //     $query .= urlencode($key) . "=" . urlencode($value) . '&';
                // }
                
                // $vnp_Url = $vnp_Url . "?" . $query;
                // if (isset($vnp_HashSecret)) {
                //     $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                //     $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                // }
                // $returnData = array(
                //     'code' => '00'
                //     ,
                //     'message' => 'success'
                //     ,
                //     'data' => $vnp_Url
                // );
                // if($inputData['vnp_TransactionStatus']==='00'){
                //     $this->luuThongTinDonHang($ten, $tongthanhtoan, $diachi, $email, $dienthoai, $nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $pttt);
                // }
                // if (isset($_POST['dathang'])) {
                //     header('Location: ' . $vnp_Url);
                //     die();
                // } else {

                // }
                
            } else {

                $this->luuThongTinDonHang($ten, $tongthanhtoan, $diachi, $email, $dienthoai, $nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $pttt);
                header('Location: index.php?pg=hoanthanhdon');
            }
        }
    }
    private function luuThongTinDonHang($ten, $tongthanhtoan, $diachi, $email, $dienthoai, $nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $pttt)
    {
        if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] > 0)) {
            $voucher = "";

            $iduser = $_SESSION['user_id']['id'];
            $madh = "KingShop" . "-" . $iduser . "-" . date("His-dmY");
        } else {
            $tendn = "Kingshop" . rand(1, 9999);
            $pass = "Kingshop123";
            $voucher = 0;
            $iduser = $this->donhang->userInsert2($tendn, $pass, $ten, $diachi, $dienthoai, $email);
            $madh = "KingShop" . "-" . $iduser . "-" . date("His-dmY");
        }
        $ngaydat = date('H:i:s d/m/Y');
        $idbill = $this->donhang->billInsertId($madh, $iduser, $ten, $diachi, $dienthoai, $nguoinhan, $dienthoai_nguoinhan, $diachi_nguoinhan, $email, $pttt, $voucher, $tongthanhtoan, $ngaydat);
        $this->donhang->insertOrderDetails($idbill);
    }
}
