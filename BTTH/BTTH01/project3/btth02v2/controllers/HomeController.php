<?php
include("services/ArticleService.php");
class HomeController{
    // Hàm xử lý hành động index
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getTopArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/home/index.php");
    }

    // Hàm xử lý hành động detail
    public function detail($ma_bviet) {
        // Nhiệm vụ 1: Tương tác với model để lấy thông tin bài viết
        $articleService = new ArticleService();
        $article = $articleService->getArticleById($ma_bviet);

        if ($article) {
            // Nhiệm vụ 2: Tương tác với view để hiển thị chi tiết bài viết
            include("views/home/detail.php");
        } else {
            echo "Bài viết không tồn tại!";
        }
    }
}