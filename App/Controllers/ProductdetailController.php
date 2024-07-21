<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Controllers\BaseController;


class ProductdetailController extends BaseController
{
    private $ProductModel;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
    }
    function index()
    {
        
        if (isset($_GET['idpro'])) {
            $idpro= $_GET['idpro'];
        }

        $sanphamct = $this->ProductModel->sanpham_get_by_id($idpro);
        $this->data["sanphamct"] = $sanphamct;
        $this->renderView("productdetail", $this->titlepage, $this->data);

    }

}
