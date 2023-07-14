<?php

namespace App\Controllers;

// use App\Models\productModel;
use App\Models\userModel;
use App\Request;
use PHPMailer\PHPMailer\PHPMailer;

class SecurityController extends Controller
{
    public function Login()
    {
        session_start();

        $this->view("Login");
    }

    public function loginPost(Request $request)
    {
        session_start();

        $users = $request->getBody();

        $u = new userModel();
        $uCheck = $u->fetch_login($users["email"], $users["password"]);

        // print_r($userCheck);

        if ($uCheck == true) {
            $user = userModel::fetch_login($users["email"], $users["password"]);

            $this->push_auth($user);
            header("location: /Trang-chu");
        } else {
            header("location: /Dang-nhap");
        }
    }

    public function Signup()
    {
        session_start();

        $this->view("Signup");
    }

    public function signupPost(Request $request)
    {
        session_start();

        $users = $request->getBody();
        $users['id_role'] = 2;
        $users['code'] = 0;
        $users['money'] = 0;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $current_time = date('Y-m-d H:i:s', strtotime('now'));
        // echo $current_time;

        $users['create_at'] = $current_time;
        $users['update_at'] = $current_time;

        $userResgister = new UserModel();
        $userResgister->insert($users);

        header("location:/Dang-nhap");
    }

    public function logout()
    {
        session_start();

        session_destroy();

        header("location: /");
    }

    public function checkEmailForgot()
    {
        session_start();
        $this->view("FogotPassword");
    }


    public function checkEmailForgotPost(Request $request)
    {
        session_start();

        $users = $request->getBody();
        $code = rand(999999, 111111);

        $_SESSION["code"] = $code;

        $mail = new PHPMailer;
        $mail->IsSMTP(); // enable SMTP

        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->setLanguage('vi', 'language/');

        $mail->Username = "ShopAccTri@gmail.com";
        $mail->Password = "arwjsvpvlitfjczz";
        $mail->SetFrom("ShopAccTri@gmail.com");
        $mail->Subject = "Gửi mã xác nhận tài khoản";
        $mail->Body = "<h2>Mã xác nhận đổi mật khẩu của của bạn là: " . $code . "</h2>";
        $mail->AddAddress($users["email"]);

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            $_SESSION["email"] = $users["email"];
            print_r($_SESSION);

            header("location: /Check-code");
        }
    }

    public function codeForgotPassword()
    {
        session_start();

        $this->request_code();

        $this->view("Verify-Code");
    }

    public function codeForgotPasswordPost(Request $request)
    {
        session_start();

        $this->request_code();

        $users = $request->getBody();

        if (isset($users["resend"])) {
            $code = rand(999999, 111111);

            $_SESSION["code"] = $code;

            $mail = new PHPMailer;
            $mail->IsSMTP(); // enable SMTP

            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->setLanguage('vi', 'language/');

            $mail->Username = "ShopAccTri@gmail.com";
            $mail->Password = "arwjsvpvlitfjczz";
            $mail->SetFrom("ShopAccTri@gmail.com");
            $mail->Subject = "Gửi mã xác nhận tài khoản";
            $mail->Body = "<h2>Mã xác nhận đổi mật khẩu của của bạn là: " . $code . "</h2>";
            $mail->AddAddress($_SESSION["email"]);

            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                header("location: /Check-code");
            }
        }

        if ($_SESSION["code"] == $users["code"]) {
            $userForgot = new userModel;
            $userForgot->fetch_code($_SESSION["code"], $_SESSION["email"]);

            header("location: /Mat-khau-moi");
        } else {
            $users["code"]  = 0;
            echo "Sai mã xác nhận";
            header("location: /Check-code");
        }
    }


    public function newPassword()
    {
        session_start();

        $this->request_code();

        $this->view("NewPassword");
    }

    public function newPasswordPost(Request $request)
    {
        session_start();

        $this->request_code();

        $users = $request->getBody();

        print_r($users);

        $userNewPassword = new userModel;
        $userNewPassword = $userNewPassword->fetch_new_password($users["password"], $_SESSION["email"]);

        header("location: /Dang-nhap");

        unset($_SESSION["code"]);
        unset($_SESSION["email"]);
    }
}
