<?php

namespace App\Controllers;

use App\Models\billModel;
use App\Models\productModel;
use App\Models\categoryModel;
use App\Models\userModel;
use App\Models\roleModel;
use App\Request;

class AdminController extends Controller
{
    //Tài khoản
    public function usersList()
    {
        session_start();

        $this->request_auth();

        $users = userModel::fetch_all();

        $this->view("admin/users/list", ["users" => $users]);
    }

    public function usersShow(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $user = userModel::fetch_one($id);
        $role = roleModel::fetch_all();

        return $this->view("admin/users/update", [
            "user" => $user,
            "roles" => $role
        ]);
    }

    public function usersUpdate(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        $userUpdate = new userModel();
        $userUpdate->update($data["id"], $data);

        header("location: ./Danh-sach-tai-khoan");
        exit;
    }

    public function usersDelete(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $userDelete = new userModel();
        $userDelete->delete($id);

        header("location: ./Danh-sach-tai-khoan");
        exit;
    }

    //Chức vụ
    public function rolesList()
    {
        session_start();

        $this->request_auth();

        $roles = roleModel::fetch_all();

        $this->view("admin/roles/list", ["roles" => $roles]);
    }

    public function rolesAdd()
    {
        session_start();

        $this->request_auth();

        $this->view("admin/roles/add");
    }

    public function rolesAddPost(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        $rolesAdd = new roleModel();
        $rolesAdd->insert($data);

        header("location: ./Danh-sach-chuc-vu");
        exit;
    }

    public function rolesShow(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $roles = roleModel::fetch_one($id);
        // $role = roleModel::fetch_all();

        $this->view("admin/roles/update", [
            "roles" => $roles
        ]);
    }

    public function rolesUpdate(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        $roleUpdate = new roleModel();
        $roleUpdate->update($data["id"], $data);

        header("location: ./Danh-sach-chuc-vu");
        exit;
    }

    public function rolesDelete(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $roleDelete = new roleModel();
        $roleDelete->delete($id);

        header("location: ./Danh-sach-chuc-vu");
        exit;
    }

    //Danh mục
    public function categoriesList()
    {
        session_start();

        $this->request_auth();

        $categories = categoryModel::fetch_all();

        $this->view("admin/categories/list", ["categories" => $categories]);
    }

    public function categoriesAdd()
    {
        session_start();

        $this->request_auth();

        $this->view("admin/categories/add");
    }

    public function categoriesAddPost(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        $data['image'] = $_FILES['image']['name'];

        // print_r($data['image']);

        move_uploaded_file($_FILES['image']['tmp_name'], "images/categories/" . $_FILES['image']['name']);


        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        $categoriesAdd = new categoryModel();
        $categoriesAdd->insert($data);

        header("location: ./Danh-sach-danh-muc");
        exit;
    }

    public function categoriesShow(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $categories = categoryModel::fetch_one($id);

        $this->view("admin/categories/update", [
            "categories" => $categories
        ]);
    }

    public function categoriesUpdate(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        if ($_FILES['image']['size'] > 0) {
            $data['image'] = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/categories/' . $data['image']);
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        $categoriesUpdate = new categoryModel();
        $categoriesUpdate->update($data["id"], $data);

        header("location: ./Danh-sach-danh-muc");
        exit;
    }

    public function categoriesDelete(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $categoriesDelete = new categoryModel();
        $categoriesDelete->delete($id);

        header("location: ./Danh-sach-danh-muc");
        exit;
    }

    //Sản phẩm

    public function productsList()
    {
        session_start();

        $this->request_auth();

        $products = productModel::fetch_all();

        $this->view("admin/products/list", ["products" => $products]);
    }

    public function productsAdd()
    {
        session_start();

        $this->request_auth();
        // $user = userModel::fetch_one($id
        $categories = categoryModel::fetch_all();

        $this->view("admin/products/add",["categories"=> $categories]);
    }

    public function productsAddPost(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        $data['image'] = $_FILES['image']['name'];


        print_r($data);

        move_uploaded_file($_FILES['image']['tmp_name'], "images/products/" . $_FILES['image']['name']);


        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        $productsAdd = new productModel();
        $productsAdd->insert($data);

        header("location: ./Danh-sach-san-pham");
        exit;
    }

    public function productsShow(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $products = productModel::fetch_one($id);
        $categories = categoryModel::fetch_all();

        $this->view("admin/products/update", [
            "products" => $products,
            "categories" => $categories
        ]);
    }

    public function productsUpdate(Request $request)
    {
        session_start();

        $this->request_auth();

        $data = $request->getBody();

        if ($_FILES['image']['size'] > 0) {
            $data['image'] = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'images/products/' . $data['image']);
        }

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));

        // $data["create_at"] = $current_time;
        $data["update_at"] = $current_time;

        echo "<pre>";
        print_r($data);
        echo "<pre>";

        $productsUpdate = new productModel();
        $productsUpdate->update($data["id"], $data);

        header("location: ./Danh-sach-san-pham");
        exit;
    }

    public function productsDelete(Request $request)
    {
        session_start();

        $this->request_auth();

        $id = $request->getBody()['id'];

        $productsDelete = new productModel();
        $productsDelete->delete($id);

        header("location: ./Danh-sach-san-pham");
        exit;
    }

    //Hóa đơn
    public function billsList()
    {
        session_start();

        $this->request_auth();

        $bills = billModel::fetch_all();

        $this->view("admin/bills/list", ["bills" => $bills]);
    }
}
