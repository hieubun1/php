<?php
include("services/ArticleService.php");
class ArticleController{
    

    public function add(){
        // Kiểm tra xem form đã submit chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $ma_bviet = $_POST['ma_bviet'];
            $tieude = $_POST['tieude'];
            $ten_bhat = $_POST['ten_bhat'];
            $ma_tgia = $_POST['ma_tgia'];
            $ma_tloai = $_POST['ma_tloai'];
            $tomtat = $_POST['tomtat'];

            // Gọi service để thêm thể loại
            $articleService = new ArticleService();
            $result = $articleService->addArticle($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai, $tomtat);

            // Kiểm tra kết quả và hiển thị
            if ($result) {
                header("Location: index.php?controller=admin&action=article");
            } else {
                echo "Lỗi khi thêm bài viết!";
            }
        } else {
            // Hiển thị form thêm thể loại
            include("views/article/add_article.php");

        }
    }

    public function edit(){
        $articleService = new ArticleService();
        if(isset($_GET['ma_bviet'])){
            $ma_bviet = $_GET['ma_bviet'];

            // Nếu form đã submit
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $tieude = $_POST['tieude'];
                $ten_bhat = $_POST['ten_bhat'];
                $ma_tgia = $_POST['ma_tgia'];
                $ma_tloai = $_POST['ma_tloai'];
                $tomtat = $_POST['tomtat'];

                // Gọi service để cập nhật thể loại
                if($articleService->updateArticle($ma_bviet, $tieude, $ten_bhat, $ma_tgia, $ma_tloai, $tomtat)){
                    header("Location: index.php?controller=admin&action=article");
                } else {
                    echo "Lỗi khi sửa bài viết!";
                }
            } else {
                // Lấy thông tin thể loại để hiển thị lên form
                $article = $articleService->getArticlesById($ma_bviet);
                include("views/article/edit_article.php");
            }

        } else {
            echo "Mã bài viết không hợp lệ!";
        }
    }


    public function del(){
        $articleService = new ArticleService();

        // Kiểm tra xem có mã bài viết hay không
        if(isset($_GET['ma_bviet'])){
            $ma_bviet = $_GET['ma_bviet'];

            // Gọi service để xóa bài viết
            if($articleService->delArticle($ma_bviet)){
                header("Location: index.php?controller=admin&action=article");
            } else {
                echo "Lỗi khi xóa bài viết!";
            }
        } else {
            echo "Mã bài viết không hợp lệ!";
        }

        // Nhiệm vụ 2: Tương tác với View
        include("views/article/list_article.php");
    }
}