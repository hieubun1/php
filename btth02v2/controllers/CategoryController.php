<?php 
include("services/CategoryService.php");

class CategoryController{
    public function add() {
        // Kiểm tra xem form đã submit chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ma_tloai = $_POST['ma_tloai'];
            $ten_tloai = $_POST['ten_tloai'];

            // Gọi service để thêm thể loại
            $categoryService = new CategoryService();
            $result = $categoryService->addCategory($ma_tloai,$ten_tloai);

            // Kiểm tra kết quả và hiển thị 
            if ($result) {
                header("Location: index.php?controller=admin&action=category");
            } else {
                echo "Lỗi khi thêm thể loại!";
            }
        } else {
            // Hiển thị form thêm thể loại
            include("views/category/add_category.php");
        }
    }

    public function edit() {
        $categoryService = new CategoryService();

        // Kiểm tra xem có mã thể loại hay không
        if (isset($_GET['ma_tloai'])) {
            $ma_tloai = $_GET['ma_tloai'];

            // Nếu form đã submit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_tloai = $_POST['ten_tloai'];

                // Gọi service để cập nhật thể loại
                if ($categoryService->updateCategory($ma_tloai, $ten_tloai)) {
                    header("Location: index.php?controller=admin&action=category");
                } else {
                    echo "Lỗi khi sửa thể loại!";
                }
            } else {
                // Lấy thông tin thể loại để hiển thị lên form
                $category = $categoryService->getCategoryById($ma_tloai);
                include("views/category/edit_category.php");
            }
        } else {
            echo "Mã thể loại không hợp lệ!";
        }
    }

    public function del() {
        $categoryService = new CategoryService();

        // Kiểm tra xem có mã thể loại hay không
        if (isset($_GET['ma_tloai'])) {
            $ma_tloai = $_GET['ma_tloai'];
            // Gọi service để xóa thể loại
            if ($categoryService->deleteCategory($ma_tloai)) {
                header("Location: index.php?controller=admin&action=category");
            } else {
                echo "Lỗi khi xóa thể loại!";
            }
        } else {
            echo "Mã thể loại không hợp lệ!";
        }
    }
}