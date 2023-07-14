<?php

namespace App\Controllers;

class Controller
{
    public function view($path, $data = [])
    {
        extract($data);
        include_once __DIR__ . "/../../resource/view/$path.php";
    }

    function currency_format($number, $suffix = ' VNĐ'){
        return number_format($number).$suffix;
    }

    public function push_auth($users)
    {
        $_SESSION["auth"] = $users;
    }

    public function get_auth()
    {
        return $_SESSION["auth"];
    }

    function is_auth()
    {
        return isset($_SESSION["auth"]);
    }

    function request_auth($isLogin = true)
    {
        if ($this->is_auth() !== $isLogin) {
            $auth = $this->get_auth();
            
            header("Location: /Dang-nhap");
            die;
        }
        if ($this->is_auth()) {
            $auth = $this->get_auth();
            if ($auth->id_role != 1) {
                header("Location: /Trang-chu");
                die;
            }
        }
    }

    function is_code()
    {
        return isset($_SESSION["code"]);
    }

    function request_code($isLogin = true)
    {
        if ($this->is_code() !== $isLogin) {
            header("Location: /Quen-mat-khau");
            die;
        }
    }
}
