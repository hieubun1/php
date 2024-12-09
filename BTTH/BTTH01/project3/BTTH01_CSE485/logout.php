<?php
session_start(); // Bắt đầu session

// Hủy tất cả các session
session_unset();
session_destroy();

// Chuyển hướng về trang login hoặc trang chủ
header("Location: index.php");
exit();
?>
