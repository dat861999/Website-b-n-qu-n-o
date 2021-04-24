<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
if(!isset($_POST['username'],$_POST['password'],$_POST['address'],$_POST['phone'],$_POST['name'])){
    die('Vui lòng nhập User và Password');
}

$Database_host ='localhost';
$Database_user ='root';
$Database_pass = '';
$Database_name = 'fashi';
$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');

if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$con_pass = mysqli_real_escape_string($con, $_POST['con-pass']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$name = mysqli_real_escape_string($con, $_POST['name']);


$querykt = "SELECT * FROM khachhang WHERE MSKH='$username'";
$results = mysqli_query($con, $querykt);

if($password != $con_pass){
    echo '
                <script>
                            alert("Mật khẩu không trùng khớp !!");
                </script>';
    }else if (mysqli_num_rows($results) == 1) {
            echo '
                <script>
                            alert("Tài khoản đã tồn tại. Vui lòng nhập tên tài khoản khác !!");
                </script>';
    }else {
            $query = "INSERT INTO khachhang VALUES ('$username', '$name',' $address','$phone','$password')";
            if ($con->query($query) === TRUE) {
                // echo "New record created successfully";
                $url = "fashi/login.php";		
                        header('Location:../'.$url);
            } else {
                    echo "Error: " . $query . "<br>" . $conn->error;
                    }
             $con->close();
            }
        }


?>