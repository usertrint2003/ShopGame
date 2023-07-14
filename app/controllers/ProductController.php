<?php

namespace App\Controllers;

use App\Models\categoryModel;
use App\Models\productModel;
use App\Models\userModel;
use App\Models\billModel;
use App\Request;

class ProductController extends Controller
{
    public function listGame(Request $request)
    {
        $id = $request->getBody()["id"];

        $products = productModel::fetch_product_list($id);
        $categories = categoryModel::fetch_name_cate($id);

        $this->view("ListAccGame",["products" => $products,"categories" => $categories]);
    }

    public function detailProduct(Request $request)
    {
        session_start();
        
        $id = $request->getBody()["id"];

        $products = productModel::fetch_one($id);

        $this->view("Chi-tiet",["products" => $products]);
    }

    public function detailProductPost(Request $request)
    {
        session_start();

        $data = $request->getBody();
        
        $getMoney = productModel::get_money_product($data["id_product"]);

        $money = $_SESSION["auth"]->money - $getMoney->price;

        $_SESSION["auth"]->money = $money;

        $status = 2;

        $moneyBuy = new userModel();
        $moneyBuy->Update_money($_SESSION["auth"]->id,$_SESSION["auth"]->money);

        $satusBuy = new productModel();
        $satusBuy->Update_status($data["id_product"],$status);

        $data["id_user"] = $_SESSION["auth"]->id;

        print_r($data);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));
        // echo $current_time;

        $data['create_at'] = $current_time;
        $data['update_at'] = $current_time;

        $Buy = new billModel();
        $Buy->insert($data);
        
        header("Location: /Tai-khoan/Mua-thanh-cong?id=".$data["id_product"]);
    }

    public function buyProduct(Request $request)
    {
        session_start();
        
        $data = $request->getBody();

        $bills = productModel::fetch_one($data["id"]);

        $this->view("Mua-thanh-cong",["bills" => $bills]);
    }

}
