<?php
    
    include 'connect/connect.php';
    session_start();
    if(isset($_POST['smit'])){
        unset($_SESSION['cart'][$_POST['dem']-1]);
    }
    if(isset($_POST['smittotal'])){
        $result=mysqli_query($con,"SELECT count(SoDonDH) as total from dathang");
        $data=mysqli_fetch_assoc($result);
        $int= $data['total'];
        if($int == 0){
            $int = 1;
        }else{
            $int++;
        }
        foreach ($_SESSION['cart'] as $row_key) {
            $MSHH =$row_key['MSHH'];
            $soluong=$row_key['soluong'];
            $dem =$row_key['dem'];
            $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.MSHH= '$MSHH'";
            $results = mysqli_query($con, $query);
            while ($row =mysqli_fetch_assoc($results)) {
            $Gia=$row['Gia']*$soluong; 
            }
            $name=$_SESSION["username"];
            $queryinsert = "INSERT INTO dathang (`SoDonDH`, `MSKH`, `MSNV`, `NgayDH`, `TrangThai`) values($int,'$name','Null',NOW(),'0')";
            $queryinsertchitiet = "INSERT INTO chitietdathang (`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) values($int,'$MSHH','$soluong','$Gia')";
            mysqli_query($con,$queryinsert); 
            mysqli_query($con,$queryinsertchitiet);
                       

    }
    // echo'<script> alert("Thanh Toán Thành Công");</script>';
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
    <title>Giỏ hàng</title>

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
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th class="p-name" style="padding-left: 60px;">Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thanh Toán</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(!isset($_SESSION['cart'])){
                                        echo '<h3>Chưa có sản phẩm trong giỏ hàng nhé khách yêu ^^</h3><hr>';
                                    }else{
                                    $Gia=0;
                                    foreach ($_SESSION['cart'] as $row_key) {
                                        $MSHH =$row_key['MSHH'];
                                        $soluong=$row_key['soluong'];
                                        $dem =$row_key['dem'];
                                        $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.MSHH= '$MSHH'";
                                        $results = mysqli_query($con, $query);
                                        while ($row =mysqli_fetch_assoc($results)) {
                                        $Gia+=$row['Gia']*$soluong;
                                        $giadh=$row['Gia']*$soluong;
                                        echo '
                                            <form action="shopping-cart.php" method="post">
                                                <tr>
                                                    <td style="width: 60px;" class="qua-col first-row">
                                                        <input style="width: 40px; border:none; text-align:center;"type="text" name="dem"value="'. $dem.'"readonly>
                                                    </td>
                                                    <td class="cart-pic first-row"><img style="width: 100px; height: 100px;" src="'.$row['Hinh'].'" alt=""></td>
                                                    <td class="cart-title first-row" style="padding-left: 60px;">
                                                        <h5>'.$row['TenHH'].'</h5>
                                                    </td>
                                                    <td style="width: 60px;" class="qua-col first-row">
                                                        <input style="width: 40px; border:none; text-align:center;"type="text" value="'.$soluong.'"readonly>
                                                    </td>
                                                    <td class="p-price first-row">'.$row['Gia'].'.000 vnd</td>
                                                    <td class="total-price first-row">'.$giadh.'.000 vnd</td>
                                                    <td class=""><button type="submit"style="border: none;"name="smit"class="ti-close"></button></td>
                                                </tr>
                                            </form>
                                            ';
                                        }
                                    }}
                                ?>    
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="./shop.php" class="primary-btn continue-shop">Mua thêm</a>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['cart']))
                        echo'
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng thanh toán <span> '.$Gia.'.000 vnd</span></li>
                                    <!-- <li class="cart-total">Thanh toán <span>380.000 vnd</span></li> -->
                                </ul>     
                                            <form action="shopping-cart.php" method="post">
                                                <button name="smittotal" type="submit" class="proceed-btn">Thanh toán</button>
                                            </form>
                            </div>
                        </div>';
                        else{
                            echo'
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Tổng thanh toán <span> 0.000 vnd</span></li>
                                    <!-- <li class="cart-total">Thanh toán <span>380.000 vnd</span></li> -->
                                </ul>     
                                            <form action="shopping-cart.php" method="post">
                                                <button name="smittotal" type="submit" class="proceed-btn">Thanh toán</button>
                                            </form>
                            </div>
                        </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
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