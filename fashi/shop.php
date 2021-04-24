<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Fashi</title>

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
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Thể loại</h4>
                        <ul class="filter-catagories">
                            <li><a href="shop.php?N=N01">Nam</a></li>
                            <li><a href="shop.php?N=N02">Nữ</a></li>
                            <li><a href="shop.php?N=N03">Trẻ em</a></li>
                            <li><a href="shop.php?N=N04">Phụ kiện</a></li>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Phổ biến</h4>
                        <div class="fw-tags">
                            <a href="shop.php?search=Áo khoác">Áo khoác</a>
                            <a href="shop.php?search=Giày">Giày</a>
                            <a href="shop.php?search=Sơ mi">Sơ mi</a>
                            <a href="shop.php?search=Balo">Balo</a>
                            <a href="shop.php?search=Nón">Nón</a>
                            <a href="shop.php?search=Áo">Áo</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-list">
                        <div class="row">
                            <?php
                                include 'connect/connect.php';
                                if(isset($_GET['N'])) {
                                    $nhom=$_GET['N'];
                                    $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and nhomhanghoa.MaNhom= '$nhom'";
                                }else                           
                                if(isset($_GET['search'])){
                                    $test = $_GET['search'];                                    
                                    $test= "%".$test."%";
                                    $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.TenHH like '$test'";
                                }else{
                                    $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom";
                                }
                                $results = mysqli_query($con, $query);
                                while ($row =mysqli_fetch_assoc($results)) {
                                    echo '
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img style ="with:270px; height:303px;"src="'.$row["Hinh"].'" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                    <li class="quick-view"><a href="product.php?MSHH='.$row["MSHH"].'">+ Xem hàng</a></li>
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
                                    </div>
                                        ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
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