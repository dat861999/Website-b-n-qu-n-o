<?php
    include 'connect/connect.php';
     session_start();
     if(isset($_SESSION['cart'])){
         $dem=count($_SESSION['cart'])+1;
     }else{
         $dem=0;
         $_SESSION['cart']=array();}   
     if(isset($_POST['smit'])){
        $MSHH="";
        $soluongconlai="";
        if($_GET['MSHH'] != "") {
            $MSHH=$_GET['MSHH'];
            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.MSHH= '$MSHH'";
            $results = mysqli_query($con, $query);
            while ($row =mysqli_fetch_assoc($results)) {
                $MSHH=$row["MSHH"];
                $soluongconlai=$row["SoLuongHang"];
            }

        }
        if($_SESSION["username"] != NUll){
            if(isset($_POST['soluong'])){
                $soluong=$_POST['soluong'];
                if($soluong >  $soluongconlai || $soluong==0){
                    echo'
                        <script>
                            alert("Vui lòng nhập số lượng phù hợp (Số lượng vượt quá số lượng trong kho hoặc bằng 0 nên không phù hợp");
                        </script>
                    ';
                }else{
                    // echo'
                    //     <script>
                    //         alert("Thêm vào giỏ hàng thành công");
                    //     </script>
                    // ';
                    
                    $b=array("dem"=>$dem,"MSHH"=>"$MSHH","soluong"=> $soluong);
                    array_push($_SESSION['cart'],$b);
                     
                }
            }    
        }else{
            echo'
            <script>
                alert("Bạn cần đăng nhập.");
            </script>
            ';
        }
     }    
     
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sản phẩm shop</title>

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
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="./shop.html">Cửa hàng</a>
                        <span>Chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="filter-widget">
                        <h4 class="fw-title">Thể loại</h4>
                        <ul class="filter-catagories">
                            <li><a href="shop.php?N=N01">Nam</a></li>
                            <li><a href="shop.php?N=N01">Nữ</a></li>
                            <li><a href="shop.php?N=N01">Trẻ em</a></li>
                            <li><a href="shop.php?N=N01">Phụ kiện</a></li>
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
                <div class="col-lg-9">
                    <div class="row">
                        <?php
                            include 'connect/connect.php';
                            if($_GET['MSHH'] != "") {
                                $MSHH=$_GET['MSHH'];
                                $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.MSHH= '$MSHH'";
                                $results = mysqli_query($con, $query);
                                while ($row =mysqli_fetch_assoc($results)) {
                                    echo '
                                    <div class="col-lg-6">
                                        <div class="" >
                                            <img class="product-big-img"style="width:400px; height:400px;" src="'.$row["Hinh"].'" alt="">
                                                <div class="zoom-icon">
                                                    
                                                    </div>
                                        </div>
                                        <div class="product-thumbs">
                                            <div class="product-thumbs-track ps-slider owl-carousel">        
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="product-details">
                                            <div class="pd-title">
                                                <span>'.$row["TenNhom"].'</span>
                                                <h3>'.$row["TenHH"].'</h3>
                                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                            </div>
                                            <div class="pd-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <span>(5)</span>
                                            </div>
                                            <div class="pd-desc">
                                                <p>'.$row["MoTaHH"].'</p>
                                                <h4>'.$row["Gia"].'.000 vnd</h4>
                                            </div>
                                            <div class="quantity">
                                                <form action="product.php?MSHH='.$row["MSHH"].'" method="post"> 
                                                    <div class="pro-qty">
                                                        <input type="text" value="1" name="soluong" >
                                                    </div>
                                                    <button type="submit"style="border: none;"name="smit" class="primary-btn pd-cart" ">Thêm giỏ hàng</button>                                                                                                                                                                                      
                                                    <style>
                                                        .button {
                                                        background-color: #4CAF50;
                                                        border: none;
                                                        color: white;
                                                        padding: 14px 100px;
                                                        text-align: center;
                                                        text-decoration: none;
                                                        display: inline-block;
                                                        font-size: 14px;
                                                        font-weight: 700;
                                                        margin: 4px 2px;
                                                        cursor: pointer;
                                                        text-transform: uppercase;
                                                        }
                                                    </style>                                                                                                                                                                                                                                                        
                                                                <a class="button"  href="./wear.php?MSHH='.$row["MSHH"].'">Thử Đồ</a>                                                        
                                                                                                                                                                                                 
                                                </form>    
                                            </div>
                                            <ul class="pd-tags">
                                                <li><span>Thể loại</span>:'.$row["TenNhom"].'</li>
                                            </ul>
                                            <div class="pd-share">
                                                <div class="p-code">Mã : '.$row["MSHH"].'</div></br>
                                                <div class="p-code">Số lượng còn lại :<span id="soluongconlai"> '.$row["SoLuongHang"].'</span></div>
                                                <div class="pd-social">
                                                    <a href="#"><i class="ti-facebook"></i></a>
                                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                                    <a href="#"><i class="ti-linkedin"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    ';
                                }
                            }
                            else {
                                
                            }
                        ?>
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