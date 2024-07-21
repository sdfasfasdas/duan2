<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;



class ProductController extends BaseController
{
    private $ProductModel;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
    }
    function index()
    {
        if (isset($_GET['idcatalog'])) {
            $idcatalog = $_GET['idcatalog'];
        } else {
            $idcatalog = 0;
        }
        $trang = 1;
        $soluong = 6;
        $this->titlepage = "danhsachsp";

        $dssp_newsp = $this->ProductModel->sanpham_get_all_idcatalog($idcatalog, $trang, $soluong);
        $dssp_catalog = $this->ProductModel->catalog_get_all();
        $this->data["dssp_newsp"] = $dssp_newsp;
        $this->data["dssp_catalog"] = $dssp_catalog;
        $this->renderView("product", $this->titlepage, $this->data);

    }

}
