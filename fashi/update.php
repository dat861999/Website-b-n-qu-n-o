<?php
    include 'connect/connect.php';
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
    //Cap nhat san pham

    if(isset($_POST['update']) && isset($_GET['MSHH'])){
        $MSHH=$_GET['MSHH'];
        $ten=$_POST['ten'];
        $soluong=$_POST['soluong'];
        $gia=$_POST['gia'];
        $query="UPDATE `hanghoa` SET `TenHH`='$ten',`Gia`=$gia,`SoLuongHang`=$soluong WHERE `MSHH`='$MSHH'";
        mysqli_query($con,$query);
        echo'<script> alert("Cập nhật thành công ^^"); </script>';
    }

    if(isset($_POST['delete'],$_GET['MSHH'])){
        $MSHH=$_GET['MSHH'];
        $query="DELETE FROM `hanghoa` WHERE `MSHH`='$MSHH'";
        mysqli_query($con,$query);
        echo'<script> alert("Xóa thành công ^^"); </script>';
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
                                        if(isset($_SESSION["username"])){
                                            if($_SESSION["username"]== NULL){
                                                echo ' <li> Ten Admin <br>
                                                </li>';
                                            }else
                                            {
                                                echo '<li>'.$_SESSION["username"].'<br>
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
                <div id="content" class=" bg-white "> 
                    <div class="breacrumb-section bg-light" style="min-height: 300px;">
                        <?php
                             if(isset($_GET['MSHH'])){
                                 echo '
                                 <div class="cart-table" >
                                 <table>
                                     <thead>
                                         <tr>
                                             <th>Ảnh sản phẩm</th>
                                             <th class="p-name" style="padding-left: 60px;">Tên sản phẩm</th>
                                             <th >Số lượng</th>
                                             <th>Giá</th>
                                             <th>Cập nhật </th>
                                             <th>Xóa </th>
                                         </tr>
                                     </thead>
                                     <tbody>';
                                 
                                include 'connect/connect.php';
                                $MSHH =  $_GET['MSHH'];
                                $query = "SELECT * FROM hanghoa where hanghoa.MSHH= '$MSHH'" ;
                                $results = mysqli_query($con, $query);
                                        while ($row =mysqli_fetch_assoc($results)) {
                                            echo '
                                                        <form action="update.php?MSHH='.$row['MSHH'].'" method="post">
                                                            <tr>
                                                                <td class="cart-pic first-row"><img style="width: 100px; height: 100px;" src="'.$row['Hinh'].'" alt=""></td>
                                                                <td class="cart-title first-row" style="padding-left: 60px;">
                                                                    <input  name="ten" type="text" value="'.$row['TenHH'].'">
                                                                </td>
                                                                <td style="width: 60px;" class="qua-col first-row">
                                                                    <input name="soluong" style="width: 40px;  border:none; text-align:center;"type="text" value="'.$row['SoLuongHang'].'">
                                                                </td>
                                                                    <td class="p-price first-row">
                                                                    <input name="gia" type="text" style="width: 40px;  border:none; text-align:center; " value="'.$row['Gia'].'">.000 vnd
                                                                </td>
                                                                <td class=""><button type="submit"style="border: none;" name="update" class=""><i style="font-size: 20px;" class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
                                                                <td class=""><button type="submit"style="border: none;" name="delete" class=""><i style="font-size: 20px;" class="fa fa-trash" aria-hidden="true"></i></button></td>
                                                            </tr>
                                                        </form>
                                                        ';
                                        }
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
