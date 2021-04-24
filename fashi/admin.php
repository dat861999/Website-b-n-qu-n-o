<?php
    include 'connect/connect.php';
    session_start();
    if(isset($_POST['submitthem'])){
        $MSHH=$_POST['MSHH'];
        $TenHH=$_POST['ten'];
        $Gia=$_POST['gia'];
        $SoLuongHang=$_POST['soluong'];
        $MaNhom=$_POST['manhom'];
        $MoTaHH=$_POST['mota'];
        if(isset($_FILES['hinh'])){
            $file_name = $_FILES['hinh']['name'];
            $file_tmp = $_FILES['hinh']['tmp_name'];   
            $src ="img/products/".$file_name;
            $query="INSERT INTO `hanghoa`(`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `Hinh`, `MoTaHH`) VALUES ('$MSHH',' $TenHH',$Gia,$SoLuongHang,'$MaNhom','$src','$MoTaHH')";
            mysqli_query($con,$query);
            move_uploaded_file($file_tmp,$src);
        }
    }

// duyet
    if(isset($_GET['type'],$_POST['duyetDH'])){
        $SoDonDH=$_POST['SoDonDH'];
        $user=$_SESSION["usernameadmin"];
        $query="UPDATE `dathang` SET `TrangThai`='1',`MSNV`='$user' WHERE `SoDonDH`= $SoDonDH";
        mysqli_query($con,$query);
    }
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/cssadmin/bootstrap.css">
    <link rel="stylesheet" href="css/cssadmin/bootstrap.min.css">
    
    <!-- Font Awesome -->   
    <link rel="stylesheet" href="css/cssadmin/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="css/cssadmin/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="css/cssadmin/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="css/cssadmin/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="css/cssadmin/animate.css">
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>

    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

  </head>

        <body class="  " >
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                    
                                <!-- .nav -->
                                <ul class="nav navbar-nav">
                                    <li><a href="login.php">Đăng xuất</a></li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                    <!-- /.navbar -->
                        <!-- /.head -->
                </div>
                <!-- /#top -->
                    <div id="left" >
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="img/logo.png">
                                    <!-- <span class="label label-danger user-label">16</span> -->
                                </a>
                        
                                <div class="media-body">
                                    <ul class="list-unstyled user-info">
                                        <li><a href="">Administrator</a></li>
                                        <?php
                                        if(isset($_SESSION["usernameadmin"])){
                                            if($_SESSION["usernameadmin"]== NULL){
                                                echo ' <li> Ten Admin <br>
                                                </li>';
                                            }else
                                            {
                                                echo '<li>'.$_SESSION["usernameadmin"].'<br>
                                                </li>';
                                            }
                                        }else 
                                                {
                                                    echo ' <li> Ten Admin <br>
                                                </li>';
                                                }
                                        
                                            ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                            <ul id="menu" class="bg-blue dker">
                                    <li class="nav-header">Menu</li>
                                    <li class="nav-divider"></li>
                                    <li>
                                        <a href="admin.php?type=duyet">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                       <span class="link-title">Duyệt đơn hàng</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="admin.php?type=capnhat">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <span class="link-title"> Cập nhật sản phẩm</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="admin.php?type=them">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <span class="link-title"> Thêm hàng hóa</span>
                                        </a>
                                    </li>
                            </ul>  
                        <!-- /#menu -->
                    </div>
                    <!-- /#left -->
                <div id="content" class=" bg-white " > 
                    <div class="breacrumb-section bg-light">
                        
                        <?php
                            if(isset($_GET['type'])){
                                if($_GET['type']=='them'){
                                   echo'
                                   <form style="width: 80%; margin-left:40px; padding-top:40px;" action="admin.php" method="post" enctype = "multipart/form-data">
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Mã hàng hóa</label>
                                            <input  name="MSHH" type="text" class="form-control" id="inputEmail4" placeholder="MSHH">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Tên hàng hóa</label>
                                            <input name="ten" type="text" class="form-control" id="inputPassword4" placeholder="Tên hàng hóa">
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Giá</label>
                                            <input name="gia" type="text" class="form-control" id="inputEmail4" placeholder="Giá hàng hóa">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Số lượng</label>
                                            <input name="soluong" type="text" class="form-control" id="inputPassword4" placeholder="Số lượng">
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                            <label for="inputEmail4">Mã nhóm</label>
                                            <input name="manhom" type="text" class="form-control" id="inputEmail4" placeholder="Nhóm hàng hóa">
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Hình ảnh</label>
                                            <input name="hinh" type="file" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-row form-group" style="padding-left:15px;">
                                            <label for="inputAddress2">Mô tả</label>
                                            <input name="mota" type="text" class="form-control" id="inputAddress2" placeholder="Mô tả">
                                        </div>
                                        <button style="margin-left: 45%;" type="submit" name="submitthem" class="btn btn-primary">Thêm hàng hóa</button>
                                        </form>
                                   ';
                                }
                                if($_GET['type']=='capnhat'){
                                    echo '
                                    <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Ảnh sản phẩm</th>
                                                <th class="p-name" style="padding-left: 60px;">Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Cập nhật </th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        include 'connect/connect.php';
                                        $query = "SELECT * FROM hanghoa" ;
                                        $results = mysqli_query($con, $query);
                                        while ($row =mysqli_fetch_assoc($results)) {
                                                    echo '
                                                        <form action="update.php?MSHH='.$row['MSHH'].'" method="post">
                                                            <tr>
                                                                <td class="cart-pic first-row"><img style="width: 100px; height: 100px;" src="'.$row['Hinh'].'" alt=""></td>
                                                                <td class="cart-title first-row" style="padding-left: 60px;">
                                                                    <h5>'.$row['TenHH'].'</h5>
                                                                </td>
                                                                <td style="width: 60px;" class="qua-col first-row">
                                                                    <input style="width: 40px; border:none; text-align:center;"type="text" value="'.$row['SoLuongHang'].'"readonly>
                                                                </td>
                                                                <td class="p-price first-row">'.$row['Gia'].'.000 vnd</td>
                                                                <td class=""><button type="submit"style="border: none;"name="smit"class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                            </tr>
                                                        </form>
                                                        ';
                                                    
                                                }
                                             
                                    echo '    </tbody>
                                    </table>
                                </div>
                                ';
                                
                            }
                            if($_GET['type']=='duyet'){
                                
                                echo '
                                    <div class="cart-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Số đơn hàng</th>
                                                <th>Ảnh sản phẩm</th>
                                                <th class="p-name" style="padding-left: 60px;">Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá <b>X</b> Số lượng</th>
                                                <th><i class="ti-close"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <form action="admin.php?type=duyet" method="post">';
                                        
                                        
                                        include 'connect/connect.php';
                                        $queryHH = "SELECT * FROM dathang where TrangThai='0'  " ;
                                        $resultsHH = mysqli_query($con, $queryHH);
                                        while ($rowHH =mysqli_fetch_assoc($resultsHH)) {
                                            $MSDH = $rowHH['SoDonDH'];
                                        $query = "SELECT * FROM chitietdathang,hanghoa where chitietdathang.MSHH=hanghoa.MSHH and chitietdathang.SoDonDH=$MSDH" ;
                                        $results = mysqli_query($con, $query);
                                        while ($row =mysqli_fetch_assoc($results)) {
                                            echo '
                                               
                                                    <tr>
                                                        <td style="width: 60px;" class="qua-col first-row">
                                                            <input style="width: 40px; border:none; text-align:center;"type="text" name="SoDonDH"value="'.$row['SoDonDH'].'"readonly>
                                                        </td>
                                                        <td class="cart-pic first-row"><img style="width: 100px; height: 100px;" src="'.$row['Hinh'].'" alt=""></td>
                                                        <td class="cart-title first-row" style="padding-left: 60px;">
                                                            <h5>'.$row['MSHH'].'</h5>
                                                        </td>
                                                        <td style="width: 60px;" class="qua-col first-row">
                                                            <input style="width: 40px; border:none; text-align:center;"type="text" value="'.$row['SoLuong'].'"readonly>
                                                        </td>
                                                        <td class="p-price first-row">'.$row['GiaDatHang'].'.000 vnd</td>
                                                    </tr>
                                                ';
                                            }
                                            echo'
                                             <tr style="border-bottom: 2px solid black; "> <td colspan="5"> <button type="submit"  style="border-radius: 6px; border: 1px solid black;" name="duyetDH"class="">Duyệt Đơn hàng</button><td></tr>
                                   
                                            </form> 
                                            ';
                                        }
                                    }
                                             
                                    echo '    
                                    </tbody>
                                    </table>
                                </div>
                                ';
                                
                            
                        }else {
                                echo'<div class="col-lg-9 order-1 order-lg-2">

                                    <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="breadcrumb-text">
                                                <a href="#"><i class="fa fa-home"></i>Admin</a>
                                                <span>Sản phẩm shop</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="product-list">
                                    <div class="row" >';
                                include "connect/connect.php";
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
                                    $hinh=$row['Hinh'];
                                    echo '
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <img style ="with:270px; height:303px;"src="'.$hinh.'" alt="">
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name">'.$row["TenNhom"].'</div>
                                                <a href="#">
                                                    <h5 style="color: white;">'.$row["TenHH"].'</h5>
                                                </a>
                                                <div class="product-price">
                                                '.$row["Gia"].'.000 vnd
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                ';}
                            }
                        ?>
                        </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- /#wrap -->
            <!--jQuery -->
            <script src="assets/lib/jquery/jquery.js"></script>
            <!--Bootstrap -->
            <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>
            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>


            <script src="assets/js/style-switcher.js"></script>
        </body>

</html>
