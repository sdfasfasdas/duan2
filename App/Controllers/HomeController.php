<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;



class HomeController extends BaseController
{
    private $ProductModel;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
    }
    function index()
    {
        $this->titlepage = "Trang chu website ban hang";
        $dssp_new = $this->ProductModel->sanpham_get_all(8);
        $dssp_view = $this->ProductModel->get_dssp_view(8);
        $this->data["dssp_new"] = $dssp_new;
        $this->data["dssp_view"] = $dssp_view;
        $this->renderView("home", $this->titlepage, $this->data);
    }
}
