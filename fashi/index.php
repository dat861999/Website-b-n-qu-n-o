
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang chủ</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php
    include 'code_include/head_nav.php';
    ?>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Đồ nữ</span>
                            <h1>Thứ sáu</h1>
                            <p>Sản phẩm thời trang nữ giảm giá với giá bán "chạm sàn": các dòng sản phẩm quần jean nữ, áo khoác, áo sơ mi nữ, công sở, giày nữ cao cấp,... sẽ được cập nhật liên tục trên danh mục thời trang khuyến mại của website</p>
                            <a href="./shop.php" class="primary-btn">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Giảm giá <span>40%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Đồ trẻ em</span>
                            <h1>Thứ sáu</h1>
                            <p>Shop Fashi giảm giá toàn bộ các mặt hàng đồ Trẻ em. Các bạn muốn mua hàng có thể đặt hàng online hoặc đến Shop để xem & mua trưc tiếp nhé.</p>
                            <a href="./shop.php" class="primary-btn">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Giảm giá <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Nam</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Nữ</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Trẻ em</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Thời trang nữ</h2>
                        <a href="shop.php?N=N02">Xem nhiều sản phẩm khác</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Trang phục nữ</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                            include 'connect/connect.php';
                            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and nhomhanghoa.MaNhom='N02'";
                            $results = mysqli_query($con, $query);
                            while ($row =mysqli_fetch_assoc($results)) {
                                echo '
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="'.$row["Hinh"].'" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?MSHH='.$row["MSHH"].'">+ Xem nhanh</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row["TenNhom"].'</div>
                                        <a href="#">
                                            <h5>'.$row["TenHH"].'</h5>
                                        </a>
                                        <div class="product-price">
                                        '.$row["Gia"].'.000 vnd
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                        <ul>
                            <li class="active">Trang phục Nam</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php
                            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and nhomhanghoa.MaNhom='N01'";
                            $results = mysqli_query($con, $query);
                            while ($row =mysqli_fetch_assoc($results)) {
                                echo '
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img style ="with:270px; height:303px;"src="'.$row["Hinh"].'" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?MSHH='.$row["MSHH"].'">+ Xem nhanh</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row["TenNhom"].'</div>
                                        <a href="#">
                                            <h5>'.$row["TenHH"].'</h5>
                                        </a>
                                        <div class="product-price">
                                        '.$row["Gia"].'.000 vnd
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>Thời trang nam</h2>
                        <a href="shop.php?N=N01">Xem thêm nhiều sản phẩm khác</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->
    <!-- kids Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/kids.jpg">
                        <h2>Thời trang trẻ em</h2>
                        <a href="shop.php?N=N03">Xem nhiều sản phẩm khác</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Trang phục cho các bé</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and nhomhanghoa.MaNhom='N03'";
                            $results = mysqli_query($con, $query);
                            while ($row =mysqli_fetch_assoc($results)) {
                                echo '
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="'.$row["Hinh"].'" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?MSHH='.$row["MSHH"].'">+ Xem nhanh</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row["TenNhom"].'</div>
                                        <a href="#">
                                            <h5>'.$row["TenHH"].'</h5>
                                        </a>
                                        <div class="product-price">
                                        '.$row["Gia"].'.000 vnd
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- kids Banner Section End -->
    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                        <ul>
                            <li class="active">Phụ kiện</li>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                    <?php
                            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and nhomhanghoa.MaNhom='N04'";
                            $results = mysqli_query($con, $query);
                            while ($row =mysqli_fetch_assoc($results)) {
                                echo '
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img style ="with:270px; height:303px;"src="'.$row["Hinh"].'" alt="">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="product.php?MSHH='.$row["MSHH"].'"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?MSHH='.$row["MSHH"].'">+ Xem nhanh</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">'.$row["TenNhom"].'</div>
                                        <a href="#">
                                            <h5>'.$row["TenHH"].'</h5>
                                        </a>
                                        <div class="product-price">
                                        '.$row["Gia"].'.000 vnd
                                        </div>
                                    </div>
                                </div>
                                    ';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/N04.jpg">
                        <h2>Phụ kiện</h2>
                        <a href="shop.php?N=N04">Xem thêm nhiều sản phẩm khác</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->
    <!-- Footer Section Begin -->
    <?php
    include 'code_include/footer.php';
    ?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>