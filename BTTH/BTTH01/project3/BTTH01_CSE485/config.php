<?php

// Thông tin kết nối cơ sở dữ liệu
$host = "127.0.0.1";
$username = "root";  // Tài khoản MySQL
$password = "";  // Mật khẩu MySQL
$dbname = "bth01_cse485_ex";  // Tên cơ sở dữ liệu
$charset = 'utf8mb4';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

