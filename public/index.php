<?php
session_start();
require_once "../vendor/autoload.php";
require_once "../App/Config/database.php";

use App\Routing\Route;

// Define routes
Route::add('/', 'HomeController@index');
Route::add('/sanpham', 'ProductController@index');
Route::add('/hoanthanhdon', 'hoanthanhdonController@index');
Route::add('/donhang', 'DonhangController@index');
Route::add('/login', 'LoginController@index');
Route::add('/dangky', 'DangkyController@index');
Route::add('/addcart', 'ShopingcartController@index');
Route::add('/productdetail', 'ProductdetailController@index');

// Dispatch the route
$uri = isset($_GET['pg']) ? '/' . $_GET['pg'] : '/';
Route::dispatch($uri);