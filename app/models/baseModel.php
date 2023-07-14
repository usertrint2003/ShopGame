<?php

namespace App\Models;

use PDO;
use PDOException;

class baseModel
{
    protected $connect;
    protected $sqlBuider;
    protected $tableName;
    // protected $orderByNewTime;
    // protected $orderByMaxPrice;

    // protected $email;
    // protected $password;


    public function __construct()
    {
        try {

            $this->connect = new PDO("mysql:host=localhost;dbname=asm_oop_php2;charsets=utf8", "root", "");
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $error) {
            echo $error;
        }
    }

    //lấy toàn bộ dữ liệu của mảng
    public static function fetch_all()
    {
        $model = new static;
        $model->sqlBuider = "SELECT * From $model->tableName";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    // public static function fetch_first_three(){
    //     $all_products = self::fetch_all();
    //     return array_slice($all_products, 0, 3);
    // }

    // public static function fetch_first_three_New()
    // {
    //     $model = new static;
    //     $model->sqlBuider = "SELECT * From $model->tableName ORDER BY $model->orderByNewTime DESC LIMIT 3";

    //     $stmt = $model->connect->prepare($model->sqlBuider);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    //     return $result;
    // }

    // public static function fetch_first_three_Max_Price()
    // {
    //     $model = new static;
    //     $model->sqlBuider = "SELECT * From $model->tableName ORDER BY $model->orderByMaxPrice DESC LIMIT 3";

    //     $stmt = $model->connect->prepare($model->sqlBuider);
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    //     return $result;
    // }

    public static function fetch_login($email, $password)
    {
        $model = new static;
        $model->sqlBuider = "SELECT * From $model->tableName WHERE `email` = '$email' AND `password` = '$password'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0];
        }

        return false;
    }

    public static function fetch_product_list($id)
    {
        $model = new static;
        $model->sqlBuider = "SELECT * From $model->tableName WHERE `id_cate` = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function fetch_name_cate($id)
    {
        $model = new static;
        $model->sqlBuider = "SELECT name From $model->tableName WHERE `id` = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0];
        }

        return false;
    }

    public static function fetch_get_money($id)
    {
        $model = new static;
        $model->sqlBuider = "SELECT money From $model->tableName WHERE `id` = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0];
        }

        return false;
    }

    //lấy một dữ liệu của mảng
    public static function fetch_one($id)
    {
        $model = new static;
        $model->sqlBuider = "SELECT * From $model->tableName WHERE id = '$id'";
// var_dump($model->sqlBuider);
        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        // var_dump($result);
        if ($result) {
            return $result[0];
        }

        return false;
    }

    public function fetch_condition($colName, $condition, $value)
    {

        $this->sqlBuider = "SELECT * From $this->tableName WHERE `$colName` $condition '$value'";

        return $this;
    }

    public function condition_SQL_And($colName, $condition, $value)
    {
        $this->sqlBuider .= " AND `$colName` $condition '$value'";
        return $this;
    }

    public function condition_SQL_Or($colName, $condition, $value)
    {
        $this->sqlBuider .= " OR `$colName` $condition '$value'";
        return $this;
    }

    public function get()
    {   
        $stmt = $this->connect->prepare($this->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    /*
            function insert: thêm dữ liệu
            param = $data là một mảng dữ liệu có cấu trúc như sau
            data = [name=>"TriNoPro",];
        */

    public function insert($data = [])
    {
        $this->sqlBuider = "INSERT INTO $this->tableName(";
        $colName = '';
        $params = '';

        foreach ($data as $key => $value) {
            $colName .= "`$key`, ";
            $params .= ":$key, ";
        }

        $colName = rtrim($colName, ', ');
        $params = rtrim($params, ', ');

        $this->sqlBuider .= $colName . ") VALUES(" . $params . ")";

        // echo $this->sqlBuider;

        $stmt = $this->connect->prepare($this->sqlBuider);
        $stmt->execute($data);
    }

    public function update($id, $data = [])
    {
        $this->sqlBuider = "UPDATE $this->tableName SET ";

        foreach ($data as $colName => $value) {
            $this->sqlBuider .= "`$colName`=:$colName, ";
        }

        $this->sqlBuider =rtrim($this->sqlBuider, ", ");

        $this->sqlBuider .= " WHERE id=:id";

        $data["id"] = $id;

        // echo $this->sqlBuider;

        $stmt = $this->connect->prepare($this->sqlBuider);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $this->sqlBuider = "DELETE FROM $this->tableName  Where id = '$id' ";

        echo $this->sqlBuider;

        $stmt = $this->connect->prepare($this->sqlBuider);
        $stmt->execute();
    }

    public static function fetch_code($code, $email)
    {
        $model = new static;
        $model->sqlBuider = "UPDATE $model->tableName SET code = $code Where email = '$email'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function fetch_new_password($pass, $email)
    {
        $model = new static;
        $model->sqlBuider = "UPDATE $model->tableName SET password = '$pass' Where email = '$email'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function fetch_make_money($id, $money)
    {
        $model = new static;
        $model->sqlBuider = "UPDATE $model->tableName SET money = $money  Where id = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function get_count($id, $nameTable)
    {
        $model = new static;
        $model->sqlBuider = "SELECT count($id) as numberCount FROM `$nameTable` ";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($model));
        if ($result) {
            return $result[0];
        }

        return false;
    }

    public static function Update_money($id, $money)
    {
        $model = new static;
        $model->sqlBuider = "UPDATE $model->tableName SET money = $money Where id = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function Update_status($id, $status)
    {
        $model = new static;
        $model->sqlBuider = "UPDATE $model->tableName SET status = '$status' Where id = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public static function get_money_product($id)
    {
        $model = new static;
        $model->sqlBuider = "SELECT price From $model->tableName WHERE `id` = '$id'";

        $stmt = $model->connect->prepare($model->sqlBuider);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0];
        }

        return false;
    }
}
