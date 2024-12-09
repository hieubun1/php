<?php
// Thông tin kết nối
function getConnection(){
    $host = 'localhost:3307'; // Địa chỉ máy chủ
    $username = 'root';  // Tên người dùng
    $password = '';      // Mật khẩu (nếu không có, để trống)
    $dbname = 'product'; // Tên cơ sở dữ liệu
    $port = 3307;       
    
// Tạo kết nối

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli($host, $username,$password, $dbname);
return $conn;
}
 ?>
