<?php
include_once ("connect.php")
// Đọc dữ liệu từ file JSON
$flowers = json_decode(file_get_contents('products.json'), true);

// Kiểm tra nếu file JSON không tồn tại hoặc không thể đọc được
if ($flowers === null) {
    $flowers = []; // Khởi tạo mảng rỗng nếu không đọc được dữ liệu từ file
}

// Kiểm tra xem có tham số 'index' trong URL không
if (isset($_GET['index']) && is_numeric($_GET['index'])) {
    $index =(int) $_GET['index'];
    echo $index;
    echo gettype($index);
    foreach ($flowers as $key=>$flower) {
    echo "<pre>";
    echo json_encode($key, JSON_PRETTY_PRINT);
    // tao tưởng code ở đây :))))
    echo "</pre>";
    }
    // Kiểm tra xem chỉ số sản phẩm có hợp lệ không
    if (isset($flowers[$index])) {
        
        // remove from sql
        $sql = "DELETE FROM sanpham WHERE id = ?";
        $conn = getConnection();
        // header('Location: index.php');
        exit; // Dừng script lại để tránh tiếp tục xử lý mã dưới đây
    } else {
        echo "Sản phẩm không tồn tại!";
        exit;
    }
} else {
    echo "Không có sản phẩm được chọn để xóa!";
    exit;
}
?>