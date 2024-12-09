<?php 
class LogoutController {
    public function logout() {
        session_start();
        // Xóa session để đăng xuất
        session_unset();
        session_destroy();
        // Chuyển hướng về trang chủ
        header('Location: index.php?controller=home&action=index');
        exit();
    }
}