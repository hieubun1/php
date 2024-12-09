<?php
include("services/UserService.php");

class SigninController {
    public function signin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userService = new UserService();
            if ($userService->login($username, $password)) {
                // Đăng nhập thành công, có thể chuyển hướng hoặc lưu session
                session_start();
                $_SESSION['username'] = $username;
                header('Location: index.php?controller=home&action=index');
                exit();
            } else {
                $error = "Thông tin đăng nhập không chính xác!";
            }
        }
        include("views/user/signin.php");
    }
}
?>