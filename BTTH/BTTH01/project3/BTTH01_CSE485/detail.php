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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Trang chủ</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ms-auto me-auto d-flex">
                        <li class="nav-item">
                            <?php
                            session_start(); // Bắt đầu session

                            if (isset($_SESSION['username'])) {
                                // Hiển thị tên người dùng và nút đăng xuất
                                echo "<span class='me-3'>Xin chào, " . $_SESSION['username'] . "!</span>";
                                echo "<a href='logout.php' class='btn btn-danger'>Thoát</a>";
                            } else {
                                // Hiển thị nút đăng nhập nếu chưa đăng nhập
                                echo "<a href='signin.php' class='btn btn-primary'>Đăng nhập</a>";
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

    </header>
    <main class="container-fluid mt-5 ">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <?php
        // Include the database configuration file
        include 'config.php';

        // Check if the `ma_bviet` parameter exists in the URL
        if (isset($_GET['ma_bviet'])) {
            // Sanitize the `ma_bviet` parameter
            $ma_bviet = (int) $_GET['ma_bviet'];

            // Prepare the SQL query to fetch the article details
            $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.noidung, baiviet.tomtat, baiviet.ten_bhat, baiviet.hinhanh, 
                           theloai.ten_tloai, tacgia.ten_tgia 
                    FROM baiviet 
                    LEFT JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
                    LEFT JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
                    WHERE baiviet.ma_bviet = $ma_bviet";

            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the article exists
            if (mysqli_num_rows($result) > 0) {
                $baiviet = mysqli_fetch_assoc($result);
            } else {
                echo "<p>Bài viết không tồn tại!</p>";
                exit();
            }
        } else {
            echo "<p>Không có bài viết được chọn!</p>";
            exit();
        }

        ?>


        <div class="row mb-5">
            <div class="col-sm-4">
                <!-- Display image -->
                <img src="images/<?= htmlspecialchars($baiviet['hinhanh']) ?>" class="img-fluid" alt="<?= htmlspecialchars($baiviet['tieude']) ?>">
            </div>
            <div class="col-sm-8">
                <h2 class="text-uppercase"><?= htmlspecialchars($baiviet['tieude']) ?></h2>
                <p><strong>Bài hát: </strong><?= htmlspecialchars($baiviet['ten_bhat']) ?></p>
                <p><strong>Thể loại: </strong><?= htmlspecialchars($baiviet['ten_tloai']) ?></p>
                <p><strong>Tóm tắt: </strong><?= htmlspecialchars($baiviet['tomtat']) ?></p>
                <p><strong>Nội dung: </strong><?= htmlspecialchars($baiviet['noidung']) ?></p>
                <p><strong>Tác giả: </strong><?= htmlspecialchars($baiviet['ten_tgia']) ?></p>
            </div>
        </div>



    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>