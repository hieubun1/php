<?php
require_once("configs/DBConnection.php");
include("models/User.php");

class UserService
{

    public function countUser()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql_user = "SELECT COUNT(user_id) as count_user FROM users";
        $stmt = $conn->query($sql_user);

        // Sử dụng fetch() với PDO để lấy kết quả
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count_user'];
    }

    public function register($username, $password, $email) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $user = new User($username, $password, $email);
        
        // Kiểm tra xem username đã tồn tại hay chưa
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $username = $user->getUsername();
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // Tài khoản đã tồn tại
        }

        // Thêm người dùng vào CSDL
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $conn->prepare($sql);
        $username = $user->getUsername();
        $stmt->bindParam(':username', $username);
        $password = $user->getPassword();
        $stmt->bindParam(':password', $password);
        $email = $user->getEmail();
        $stmt->bindParam(':email', $email);
        return $stmt->execute(); // Trả về true nếu thành công
    }

    public function login($username, $password) {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // Kiểm tra thông tin đăng nhập
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return password_verify($password, $row['password']); // Kiểm tra mật khẩu
        }
        return false; // Người dùng không tồn tại
    }
}