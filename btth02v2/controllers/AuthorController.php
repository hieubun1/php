<?php
require_once("services/AuthorService.php");

class AuthorController
{
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ma_tgia = $_POST['ma_tgia'];
            $ten_tgia = $_POST['ten_tgia'];

            // Gọi service để thêm thể loại
            $authorService = new AuthorService();
            $result = $authorService->addAuthor($ma_tgia, $ten_tgia);

            // Kiểm tra kết quả và hiển thị 
            if ($result) {
                header("Location: index.php?controller=admin&action=author");
            } else {
                echo "Lỗi khi thêm thể loại!";
            }
        } else {
            // Hiển thị form thêm thể loại
            include("views/author/add_author.php");
        }
    }

    public function edit()
    {
        $authorService = new AuthorService();
        if (isset($_GET['ma_tgia'])) {
            $ma_tgia = $_GET['ma_tgia'];

            // Nếu form đã submit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_tgia = $_POST['ten_tgia'];

                // Gọi service để cập nhật thể loại
                if ($authorService->updateAuthor($ma_tgia, $ten_tgia)) {
                    header("Location: index.php?controller=admin&action=author");
                } else {
                    echo "Lỗi khi sửa thể loại!";
                }
            } else {
                // Lấy thông tin thể loại để hiển thị lên form
                $author = $authorService->getAuthorById($ma_tgia);
                include("views/author/edit_author.php");
            }
        } else {
            echo "Mã thể loại không hợp lệ!";
        }
    }

    public function del() {
        $authorService = new AuthorService();

        // Kiểm tra xem có mã thể loại hay không
        if (isset($_GET['ma_tgia'])) {
            $ma_tgia = $_GET['ma_tgia'];
            // Gọi service để xóa thể loại
            if ($authorService->deleteAuthor($ma_tgia)) {
                header("Location: index.php?controller=admin&action=author");
            } else {
                echo "Lỗi khi xóa thể loại!";
            }
        } else {
            echo "Mã thể loại không hợp lệ!";
        }
    }
}
