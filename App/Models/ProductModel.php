<?php
namespace App\Models;
class ProductModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function sanpham_get_all($limi)
    {
        $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
        return $this->db->get_all($sql);
    }
    function sanpham_get_by_id($id)
    {
        $sql = "SELECT * FROM sanpham WHERE id = " . $id;
        return $this->db->get_all($sql);
    }
    function get_dssp_view($limi)
    {
        $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
        return $this->db->get_all($sql);
    }
    function sanpham_get_all_idcatalog($idcatalog, $trang, $soluong)
    {
        $sql = "SELECT * FROM sanpham WHERE 1";

        if ($idcatalog > 0) {
            $sql .= " AND idloaisp=" . $idcatalog;
        }

        $limit1 = ($trang - 1) * $soluong;
        $limit2 = $soluong;

        $sql .= ' ORDER BY view DESC LIMIT ' . $limit1 . ',' . $limit2;

        return $this->db->get_all($sql);
    }
    function catalog_get_all()
    {
        $sql = "select * from loaisp ORDER BY id DESC";
        return $this->db->get_all($sql);
    }
    function sanpham_show_giohang($dssp)
    {
        $html_showcart = "";
        foreach ($dssp as $key => $showcart) {
            extract($showcart);
            $stt = $key;
            $ttt = $price * $soluong;
            $gia = number_format($price, 0, '.', ',');
            $tongT = number_format($ttt, 0, '.', ',');
            $html_showcart .= '
    <tr>
        <td>
            <div class="media">
                <div class="d-flex">
                    <img src="img/' . $img . '" alt="">
                </div>
                <div class="media-body">
                    <p>' . $name . '</p>
                    <p style="font-size: 16px; font-weight: bold; color: #333; margin: 0;">Size: ' . $size . '</p>
                    <form action="index.php?pg=addcart" method="post" style="margin-top: 10px;">
                        <input type="hidden" name="product_id_to_delete" value="' . $id . '">
                        <input type="submit" value="Xóa" style="background-color: red; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                    </form>
                </div>
            </div>
        </td>
        <td>
            <h5>' . $gia . ' VNĐ</h5>
        </td>
        <td>
            <div class="product_count">
                <input type="number" name="qty" id="qty_' . $stt . '" maxlength="12" value="' . $soluong . '" title="Quantity:" class="input-text qty" min="1">
                <button onclick="increaseQty(' . $stt . ')" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                <button onclick="reduceQty(' . $stt . ')" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
            </div>
        </td>
        <td>
            <h5 class="subtotal" id="subtotal_' . $stt . '">' . $tongT . ' VNĐ</h5>
        </td>
    </tr>';

        }
        return $html_showcart;
    }
    function sanpham_show($dssp)
    {
        $html_dssp_new = "";
        foreach ($dssp as $item) {
            extract($item);
            $user_id = 0;
            $formatted_price1 = number_format($giaban, 0, '.', ',');
            $formatted_price2 = number_format($giathat, 0, '.', ',');
            $html_dssp_new .= '<div class="col-lg-3 col-md-6">
            <div class="single-product">
                <a href="index.php?pg=productdetail&idpro=' . $id . '"><img class="img-fluid" src="img/' . $hinhanh . '" alt=""></a>
                <div class="product-details">
                    <a href="index.php?pg=productdetail&idpro=' . $id . '"><h6>' . $tensp . '</h6></a>
                    <div class="price">
                        <h6>' . $formatted_price1 . ' VNĐ</h6>
                        <h6 class="l-through">' . $formatted_price2 . ' VNĐ</h6>
                    </div>
                    
                </div>
            </div>
        </div>';
        }
        return $html_dssp_new;
    }
    function sanpham_show_product($dssp)
    {
        $html_dssp_newsp = "";

        foreach ($dssp as $item) {
            extract($item);
            $user_id = 0;
            $formatted_price1 = number_format($giaban, 0, '.', ',');
            $formatted_price2 = number_format($giathat, 0, '.', ',');
            $html_dssp_newsp .= '<div class="col-lg-4 col-md-6">
            <div class="single-product">
            <a href="index.php?pg=productdetail&idpro=' . $id . '"><img class="img-fluid" src="img/' . $hinhanh . '" alt=""></a>
                <div class="product-details">
                    <a href="index.php?pg=productdetail&idpro=' . $id . '"><h6>' . $tensp . '</h6></a>
                    <div class="price">
                        <h6>' . $formatted_price1 . ' VNĐ</h6>
                        <h6 class="l-through">' . $formatted_price2 . ' VNĐ</h6>
                    </div>
                </div>
            </div>
        </div>';
        }
        return $html_dssp_newsp;
    }
}
