<?php
namespace App\Models;
class ViewModel
{
    private $db;
    function __construct()
    {
        $this->db = new DatabaseModel;
    }
    function Show_donhang($dsdh){
        $html_donhang="";
        foreach ($dsdh as $dh){
            extract($dh);
            $tt=$price*$soluong;
            $tongdh = number_format($tt, 0, '.', ',');
            $html_donhang.='<li><a href="index.php?pg=productdetail&idpro='.$id.'">'.$name.'(size: '.$size.') <span class="middle">x '.$soluong.'</span> <span
            class="last">'.$tongdh.'</span></a></li>';
        }
        return $html_donhang;
    }
}