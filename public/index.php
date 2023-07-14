<?php

namespace App\Models;

// Sử dụng Controller
use App\Controllers\HomeController;
use App\Controllers\SecurityController;
use App\Controllers\AdminController;
use App\Controllers\ProductController;

//PhpMailler
require("PHPMailer-master/src/PHPMailer.php");
require("PHPMailer-master/src/SMTP.php");
require("PHPMailer-master/src/Exception.php");



// use App\Models\categoryModel;
use App\Router;

require_once __DIR__ . "/../vendor/autoload.php";

$router = new Router;

//Trang chủ
Router::get("/", [HomeController::class, 'Home']);
Router::get("/Trang-chu", [HomeController::class, 'Home']);

Router::get("/Gioi-thieu", [HomeController::class, 'gioiThieu']);

Router::get("/Nap-the", [HomeController::class, 'napThe']);
Router::post("/Nap-the", [HomeController::class, 'napThePost']);


//Chức năng đăng ký đăng nhập
Router::get("/Dang-nhap", [SecurityController::class, 'Login']);
Router::post("/Dang-nhap", [SecurityController::class, 'loginPost']);

Router::get("/Dang-ky", [SecurityController::class, 'Signup']);
Router::post("/Dang-ky", [SecurityController::class, 'signupPost']);

Router::get("/Quen-mat-khau", [SecurityController::class, 'checkEmailForgot']);
Router::post("/Quen-mat-khau", [SecurityController::class, 'checkEmailForgotPost']);

Router::get("/Check-code", [SecurityController::class, 'codeForgotPassword']);
Router::post("/Check-code", [SecurityController::class, 'codeForgotPasswordPost']);

Router::get("/Mat-khau-moi", [SecurityController::class, 'newPassword']);
Router::post("/Mat-khau-moi", [SecurityController::class, 'newPasswordPost']);

Router::get("/Dang-xuat", [SecurityController::class, 'logout']);

//List tài khoản game
Router::get("/Tai-khoan/Tai-khoan-game", [ProductController::class, 'listGame']);
Router::get("/Tai-khoan/Chi-tiet-tai-khoan", [ProductController::class, 'detailProduct']);
Router::post("/Tai-khoan/Chi-tiet-tai-khoan", [ProductController::class, 'detailProductPost']);
Router::get("/Tai-khoan/Mua-thanh-cong", [ProductController::class, 'buyProduct']);




//Trang Admin

//Tài khoản
Router::get("/Admin/Danh-sach-tai-khoan", [AdminController::class, 'usersList']);
Router::get("/Admin/Sua-tai-khoan", [AdminController::class, 'usersShow']);
Router::post("/Admin/Sua-tai-khoan", [AdminController::class, 'usersUpdate']);
Router::get("/Admin/Xoa-tai-khoan", [AdminController::class, 'usersDelete']);

//Chức vụ
Router::get("/Admin/Danh-sach-chuc-vu", [AdminController::class, 'rolesList']);
Router::get("/Admin/Them-chuc-vu", [AdminController::class, 'rolesAdd']);
Router::post("/Admin/Them-chuc-vu", [AdminController::class, 'rolesAddPost']);
Router::get("/Admin/Sua-chuc-vu", [AdminController::class, 'rolesShow']);
Router::post("/Admin/Sua-chuc-vu", [AdminController::class, 'rolesUpdate']);
Router::get("/Admin/Xoa-chuc-vu", [AdminController::class, 'rolesDelete']);

//Danh mục
Router::get("/Admin/Danh-sach-danh-muc", [AdminController::class, 'categoriesList']);
Router::get("/Admin/Them-danh-muc", [AdminController::class, 'categoriesAdd']);
Router::post("/Admin/Them-danh-muc", [AdminController::class, 'categoriesAddPost']);
Router::get("/Admin/Sua-danh-muc", [AdminController::class, 'categoriesShow']);
Router::post("/Admin/Sua-danh-muc", [AdminController::class, 'categoriesUpdate']);
Router::get("/Admin/Xoa-danh-muc", [AdminController::class, 'categoriesDelete']);

//Sản phẩm
Router::get("/Admin/", [AdminController::class, 'productsList']);

Router::get("/Admin/Danh-sach-san-pham", [AdminController::class, 'productsList']);
Router::get("/Admin/Them-san-pham", [AdminController::class, 'productsAdd']);
Router::post("/Admin/Them-san-pham", [AdminController::class, 'productsAddPost']);
Router::get("/Admin/Sua-san-pham", [AdminController::class, 'productsShow']);
Router::post("/Admin/Sua-san-pham", [AdminController::class, 'productsUpdate']);
Router::get("/Admin/Xoa-san-pham", [AdminController::class, 'productsDelete']);

//Hóa đơn
Router::get("/Admin/Danh-sach-hoa-don", [AdminController::class, 'billsList']);
Router::get("/Admin/Xoa-hoa-don", [AdminController::class, 'billsDelete']);



$router->resolve();
