<?php
include("views/layout/header.php");
?>
<div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<main>
    <h3 class="text-center text-uppercase mb-3 mt-3 text-primary">TOP bài hát yêu thích</h3>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img src="assets/images/<?= $article['hinhanh'] ?>" class="img-fluid" alt="...">
                        <div class="card-body">
                            <a href="index.php?controller=home&action=detail&ma_bviet=<?= $article['ma_bviet'] ?>" class="btn btn-outline-success text-decoration-none text-dark d-flex justify-content-center align-items-center"><?php echo $article['tieude'] ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</main>

<?php
include("views/layout/footer.php");
?>