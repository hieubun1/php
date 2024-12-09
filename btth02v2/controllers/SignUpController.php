<?php
include("services/UserService.php");

class SignupController {
    public function signup() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $userService = new UserService();
            if ($userService->register($username, $password, $email)) {
                // Đăng ký thành công
                header('Location: index.php?controller=signin&action=signin');
                exit();
            } else {
                $error = "Tài khoản đã tồn tại!";
            }
        }
        include("views/user/signup.php");
    }
}

?>