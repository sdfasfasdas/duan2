<?php
namespace App\Controllers;
use App\Models\ProductModel;
use App\Controllers\BaseController;



class hoanthanhdonController extends BaseController
{
    private $ProductModel;
    function __construct()
    {
        $this->ProductModel = new ProductModel;
    }
    function index()
    {
        $titlepage="";
        $this->renderView("hoangthanhdon", $this->titlepage, $this->data);
    }
}
