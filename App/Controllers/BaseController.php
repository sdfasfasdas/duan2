<?php
namespace App\Controllers;

class BaseController
{
    protected $data = [];
    protected $titlepage = "";
    function renderView($viewpage, $titlepage, $data)
    {
        $viewfile = '../app/view/' . $viewpage . '.php';
        // echo $viewfile;
        if (is_file($viewfile)) {
            include $viewfile;
        } else {
            echo 'Trang nay ko ton tai';
        }
    }
}
