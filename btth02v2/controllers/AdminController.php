<?php
include("services/CategoryService.php");
include("services/AuthorService.php");
include("services/ArticleService.php");
include("services/UserService.php");


class AdminController{
    public function index(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $authorService = new AuthorService();
        $articleService = new ArticleService();
        $userService = new UserService();
        $countCategory = $categoryService->countCategory();
        $countAuthor = $authorService->countAuthor();
        $countArticle = $articleService->countArticle();
        $countUser = $userService->countUser();
        // Nhiệm vụ 2: Tương tác với View
        include("views/admin/index.php");
    }

    public function category(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategories();
        // Nhiệm vụ 2: Tương tác với View
        include("views/category/index.php");
    }

    public function author(){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthors();
        // Nhiệm vụ 2: Tương tác với View
        include("views/author/index.php");
    }

    public function article($ma_bviet){
        // Nhiệm vụ 1: Tương tác với Services/Models
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        // Nhiệm vụ 2: Tương tác với View
        include("views/article/index.php");
    }
}