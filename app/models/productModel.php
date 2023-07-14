<?php

namespace App\Models;

class productModel extends baseModel
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $account_product;
    public $password_product;
    public $id_cate;
    public $create_at;
    public $update_at;
    public $status;
    protected $tableName = "products";

    // protected $oderByNewTime = "ngaytao";r
    // protected $orderByMaxPrice = "gia";
}
