<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="my-logo">
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.png" alt="" class="img-fluid">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                        </li>
                    </ul>
                    <div class="navbar-nav">
                        <li class="nav-item d-flex align-items-center">
                            <?php
                            session_start(); // Bắt đầu session
 
                            if (isset($_SESSION['username'])) {
                                // Hiển thị tên người dùng và nút đăng xuất
                                echo "<p class='m-0'>Xin chào, " . $_SESSION['username'] . "!</p>";
                                echo "<a href='logout.php' class='btn btn-danger ms-2' aria-curent='page'>Thoát</a>";
                            } else {
                                // Hiển thị nút đăng nhập nếu chưa đăng nhập
                                echo "<a href='signin.php' class='btn btn-primary' aria-curent='page'>Đăng nhập</a>";
                            }
                            ?>
                        </li>
                    </div>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Nội dung cần tìm" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>

        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slideshow/slide01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slide02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slide03.jpg" class="d-block w-100" alt="...">
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
    </header>
    <main>
        <h3 class="text-center text-uppercase mb-3 mt-3 text-primary">TOP bài hát yêu thích</h3>
        <?php
        include 'config.php';
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
        $offset = ($current_page - 1) * $item_per_page;
        $sql = mysqli_query($conn, "SELECT ma_bviet, hinhanh, tieude FROM baiviet");
        $total_records = $sql->num_rows;
        $total_pages = ceil($total_records / $item_per_page);

        ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                while ($baiviet = mysqli_fetch_array($sql)) {
                ?>
                    <div class="col-md-3 mt-3">
                        <div class="card mb-5 shadow-sm" style="width:18rem">
                            <img src="images/<?= $baiviet['hinhanh'] ?>" class="img-fluid" alt="<?= $baiviet['tieude'] ?>">
                            <div class="justify-content-between align-items-center text-center mt-3">
                                <a href="detail.php?ma_bviet=<?= $baiviet['ma_bviet'] ?>" class="btn btn-sm btn-outline-secondary"><?= $baiviet['tieude'] ?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>