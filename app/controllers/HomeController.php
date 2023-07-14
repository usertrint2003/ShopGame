<?php

namespace App\Controllers;

use App\Models\productModel;

use App\Models\categoryModel;
use App\Models\userModel;
use App\Request;

class HomeController extends Controller
{
    public function Home()
    {
        session_start();

        $this->is_auth();

        // print_r($_SESSION);
        
        $categories = categoryModel::fetch_all();
        $this->view("Trang-chu", ["categories" => $categories]);;
    }

    public function gioiThieu()
    {
        $this->view("Gioi-thieu");
    }

    public function napThe()
    {
        session_start();
        $this->view("Nap-the");
    }

    public function napThePost(Request $request)
    {
        session_start();

        $data = $request->getBody();

        $user = userModel::fetch_get_money($_SESSION["auth"]->id);

        $money = 0;

        if (isset($_POST["btn_code"])) {
            // print_r($data["code"]);

            //Thẻ 20k
            if ($data["code"] == "c2d866c8f87d46f620a66f64357bfdab") {
                $money = 20000;
            };

            //Thẻ 50k
            if ($data["code"] == "7e2f35902694898bebf295305471ce09") {
                $money = 50000;
            };

            //Thẻ 100k
            if ($data["code"] == "12277132c4446ec03bdb8b55891b24d4") {
                $money = 100000;
            };

            //Thẻ 200k
            if ($data["code"] == "f358c47f78a25642640e3cc8ec3bc5f6") {
                $money = 200000;
            };

            //Thẻ 500k
            if ($data["code"] == "36dadfb73e181a2a5272a2ccfdb70727") {
                $money = 500000;
            };

            // print_r($money);

            $user->money += $money;

            $_SESSION["auth"]->money = $user->money;

            $users = new userModel();
            $users->fetch_make_money($_SESSION["auth"]->id,$user->money);

            header("location: /");
            exit;
        }
    }
}
