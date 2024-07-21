<?php
require_once 'pdo.php';




function get_dssp_new($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}



function get_dssp_best($limi)
{
    $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function getById_SanPham($db, $id)
{
    $sql = "SELECT * FROM sanpham WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $row = $stmt->fetch();
    return $row;
}

function get_dssp_view($limi)
{
    $sql = "SELECT * FROM sanpham ORDER BY view DESC limit " . $limi;
    return pdo_query($sql);
}

function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE iddm=? AND id<>? ORDER BY view DESC limit " . $limi;
    return pdo_query($sql, $iddm, $id);
}
function getById_bill($db, $id)
{
    $sql = "SELECT * FROM bill WHERE id=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->execute();
    $row = $stmt->fetch();
    return $row;
}
function getById_cart($db, $idbill)
{
    $sql = "SELECT * FROM cart WHERE idbill=:id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $idbill);

    $stmt->execute();
    $row = $stmt->fetchAll();
    return $row;
}

function get_dssp($kyw, $iddm, $idtg, $limi)
{
    $sql = "SELECT * FROM sanpham WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($idtg > 0) {
        $sql .= " AND idtacgia=" . $idtg;
    }
    if ($kyw != "") {
        $sql .= " AND name like'%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id DESC limit " . $limi;
    return pdo_query($sql);
}
function showsp($dssp)
{
    $html_dssp = '';
    if (isset($_GET['user_id']) && ($_GET['user_id']) != "") {
        $user_id = $_GET['user_id'];
    } else {
        $user_id = "";
    }
    foreach ($dssp as $sp) {
        extract($sp);

        if ($bestseller == 1) {
            $best = '<div class="best" id="quydinhhienthi"></div>';
        } else {
            $best = '';
        }
        $formatted_price = number_format($price, 0, '.', ','); // Định dạng giá tiền
        $link = "index.php?pg=sanphamchitiet&idsp=$id&user_id=$user_id";
        if ($anhien == 1) {
            $html_dssp .= '<div class="col-lg-3 col-md-6">
            <div class="single-product">
                <img class="img-fluid" src="img/product/p1.jpg" alt="">
                <div class="product-details">
                    <h6>addidas New Hammer sole
                        for Sports person</h6>
                    <div class="price">
                        <h6>$150.00</h6>
                        <h6 class="l-through">$210.00</h6>
                    </div>
                    <div class="prd-bottom">

                        <a href="" class="social-info">
                            <span class="ti-bag"></span>
                            <p class="hover-text">add to bag</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-heart"></span>
                            <p class="hover-text">Wishlist</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-sync"></span>
                            <p class="hover-text">compare</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-move"></span>
                            <p class="hover-text">view more</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
        } else {
            $html_dssp .= '<div class="col-lg-3 col-md-6">
            <div class="single-product">
                <img class="img-fluid" src="img/product/p1.jpg" alt="">
                <div class="product-details">
                    <h6>addidas New Hammer sole
                        for Sports person</h6>
                    <div class="price">
                        <h6>$150.00</h6>
                        <h6 class="l-through">$210.00</h6>
                    </div>
                    <div class="prd-bottom">

                        <a href="" class="social-info">
                            <span class="ti-bag"></span>
                            <p class="hover-text">add to bag</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-heart"></span>
                            <p class="hover-text">Wishlist</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-sync"></span>
                            <p class="hover-text">compare</p>
                        </a>
                        <a href="" class="social-info">
                            <span class="lnr lnr-move"></span>
                            <p class="hover-text">view more</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>';
        }
    }

    return $html_dssp;
}
function sanpham_select_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id=?";
    return pdo_query_one($sql, $id);
}


