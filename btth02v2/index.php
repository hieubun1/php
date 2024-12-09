<!-- Routing là gì? Định tuyến/Điều hướng -->
<!-- Phân tích xem: URL của người dùng > Muốn gì -->
<!-- Ví dụ: Trang chủ, Quản lý bài viết hay Thêm bài viết -->
<!-- Chuyển quyền cho Controller tương ứng điều khiển tiếp -->
<!-- URL của tôi thiết kế luôn có dạng: -->

<!-- http://localhost/btth02v2/index.php?controller=A&action=B -->
<!-- http://localhost/btth02v2/index.php -->
<!-- http://localhost/btth02v2/index.php?controller=home&action=index -->

<!-- Controller là tên của FILE controller mà chúng ta sẽ gọi -->
<!-- Action là tên cả HÀM trong FILE controller mà chúng ta gọi -->

<?php
// B1: Bắt giá trị controller và action
$controller = isset($_GET['controller']) ?   $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ?       $_GET['action'] : 'index';
$param = isset($_GET['ma_bviet']) ? $_GET['ma_bviet'] : 0;



// B2: Chuẩn hóa tên trước khi gọi
$controller = ucfirst($controller);
$controller .= 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';


// B3: Kiểm tra file controller có tồn tại không
if (file_exists($controllerPath)) {
    include($controllerPath);
} else {
    echo "Controller không tồn tại!";
    exit();
}


$controllerInstance = new $controller();

// B6: Gọi phương thức action tương ứng
if (method_exists($controllerInstance, $action)) {
    // Nếu action yêu cầu tham số, truyền tham số vào
    if ($param !== null) {
        $controllerInstance->$action($param);  // Truyền ma_bviet vào action detail
    } else {
        $controllerInstance->$action();  // Gọi action không có tham số
    }
} else {
    die("Lỗi! Action '$action' không tồn tại trong controller '$controller'.");
};


