<?php
if(!isset($_SESSION)) { session_start(); }

?>
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        dat861999@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +84 943452837
                    </div>
                </div>
                <div class="ht-right">
                    <?php
                        if( !isset($_SESSION["username"])){
                            echo ' <a href="./login.php" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>';
                        }else
                        {
                            $user=$_SESSION["username"];
                            include 'connect/connect.php';
                            $query = "SELECT * FROM khachhang WHERE MSKH='$user'";
                            $results = mysqli_query($con, $query);
                            if(mysqli_num_rows($results) == 1){
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo '<p class="login-panel"><i class="fa fa-user"></i>Xin chào:&nbsp '.$row['HoTenKH'].'</p>';
                                    echo '
                                        <a href="./login.php" class="login-panel"><i class="fa fa-user"></i>Đăng xuất &nbsp  &nbsp </a>';
                                }
                            } 
                            
                        }
                    ?>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag/flag-1.png" data-imagecss="flag yt"
                                data-title="VietNam">VN</option>
                            <option value='yu' data-image="img/flag-1.jpg" data-imagecss="flag yu"
                                data-title="English">Eng</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-lg-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Tìm kiếm</button>
                            <form action="shop.php" class="input-group" method="get">
                                <input type="text" name="search" placeholder="Bạn muốn tìm?">
                                <button type="submitsearch" name="submit"> <i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION["username"]) ){
                            $Gia=0;
                            if(isset($_SESSION['cart'])){
                           echo '<div class="col-lg-3 text-right col-lg-3">
                           <ul class="nav-right">
                                       <span><b>Giỏ hàng</b></span>
                               <li class="cart-icon"><a href="shopping-cart.php">
                                       <i class="icon_cart_alt"></i>
                                       <span>'.count($_SESSION['cart']).'</span>
                                       <div class="cart-hover">
                                       <div class="select-items">';
                                       foreach ($_SESSION['cart'] as $row) {
                                           $MSHH =$row['MSHH'];
                                           $soluong=$row['soluong'];
                                           $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom and hanghoa.MSHH= '$MSHH'";
                                           $results = mysqli_query($con, $query);
                                           while ($row =mysqli_fetch_assoc($results)) {
                                            $Gia+=$row['Gia']*$soluong;
                                        echo '
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="si-pic"><img style="width:100px; height:100px;" src="'.$row['Hinh'].'" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>'.$row['Gia'].'.000 vnd x '.$soluong.'</p>
                                                                <h6>'.$row['TenHH'].'</h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <!-- <i class="ti-close"></i>-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                       
                                        ';

                                        } 
                                            
                                        } 
                             echo '
                                    </div>
                                        <div class="select-total">
                                                    
                                        <h5>Tổng Giá: '.$Gia.'.000 vnd</h5>
                                    </div>
                                    <div class="select-button">
                                </div>
                            </div>      
                               </li>
                               <li class="cart-price">'.$Gia.'.000 vnd</li>
                           </ul>
                       </div>';}
                        else{
                            echo '<div class="col-lg-3 text-right col-lg-3">
                           <ul class="nav-right">
                                       <span><b>Giỏ hàng</b></span>
                               <li class="cart-icon"><a href="shopping-cart.php">
                                       <i class="icon_cart_alt"></i>
                                       <span>0</span>
                                       <div class="cart-hover">
                                       <div class="select-items">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="si-pic"><img style="width:100px; height:100px;" src="" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>0.000 vnd </p>
                                                                <h6></h6>
                                                            </div>
                                                        </td>
                                                        <td class="si-close">
                                                            <!-- <i class="ti-close"></i>-->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                    </div>
                                        <div class="select-total">
                                                    
                                        <h5>Tổng Giá: '.$Gia.'.000 vnd</h5>
                                    </div>
                                    <div class="select-button">
                                </div>
                            </div>      
                               </li>
                               <li class="cart-price">'.$Gia.'.000 vnd</li>
                           </ul>
                       </div>';
                        }
                        }else{
                            echo'<div class="col-lg-3 text-right col-lg-3">
                                    <ul class="nav-right">
                                        <span><b>Giỏ hàng &nbsp</b></span>
                                        <i class="icon_cart_alt"></i>
                                        <span><b>&nbsp Bạn cần đăng nhập</b></span>
                                    </ul>
                                 </div>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart" style="margin-left:15%;">
                    <div class="depart-btn" >
                        <i class="ti-menu"></i>
                        <span>Danh mục</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="shop.php?N=N01">Trang phục nam</a></li>
                            <li><a href="shop.php?N=N02">Trang phục nữ</a></li>
                            <li><a href="shop.php?N=N03">Trang phục trẻ em</a></li>
                            <li><a href="shop.php?N=N04">Phụ kiện</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Trang chủ</a></li>
                        <li><a href="./shop.php">Shop</a></li>
                        <li><a href="./contact.php">Địa chỉ</a></li>
                        <li><a href="#">Thông tin</a>
                            <ul class="dropdown">
                                <li><a href="./shopping-cart.php">Giỏ hàng</a></li>
                                <li><a href="./register.php">Đăng ký</a></li>
                                <li><a href="./login.php">Đăng nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->