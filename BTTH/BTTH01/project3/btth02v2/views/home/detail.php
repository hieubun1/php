<?php
include ("views/layout/header.php");
?>

    </header>
    <main class="container-fluid mt-5 ">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row mb-5">
                <div class="col-sm-4">
                    <!-- Display image -->
                    <img src="assets/images/<?= $article->getHinhanh(); ?>" class="img-fluid" alt="<?= $article->getTieude(); ?>">
                </div>
                <div class="col-sm-8">
                    <h2 class="text-uppercase"><?= $article->getTieude(); ?></h2>
                    <p><strong>Bài hát: </strong><?= $article->getTen_bhat(); ?></p>
                    <p><strong>Thể loại: </strong><?= $article->getMa_tloai(); ?></p>
                    <p><strong>Tóm tắt: </strong><?= $article->getTomtat(); ?></p>
                    <p><strong>Nội dung: </strong><?= $article->getNoidung(); ?></p>
                    <p><strong>Tác giả: </strong><?= $article->getMa_tgia(); ?></p>
    
                </div>
        </div>

<?php
include ("views/layout/footer.php");
?>