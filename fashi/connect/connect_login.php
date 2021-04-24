<!-- <?php
 session_start();

?> -->

<?php
if(isset($_POST['submit'])){
if(!isset($_POST['Username'],$_POST['Password'])){
    die('Vui lòng nhập User và Password');
}

//Ket noi Database
$Database_host ='localhost';
$Database_user ='root';
$Database_pass = '';
$Database_name = 'fashi';
$con = mysqli_connect($Database_host,$Database_user,$Database_pass,$Database_name) or die ('Kết nối thất bại');

$username = mysqli_real_escape_string($con, $_POST['Username']);
$password = mysqli_real_escape_string($con, $_POST['Password']);

$query = "SELECT * FROM khachhang WHERE MSKH='$username'";
	$results = mysqli_query($con, $query);



if (mysqli_num_rows($results) == 0) {
	$querynv = "SELECT * FROM nhanvien WHERE MSNV='$username'";
	$resultsnv = mysqli_query($con, $querynv);
	if (mysqli_num_rows($resultsnv) == 0) {
		echo "
				<script>
					 alert('Tài khoản không tồn tại!!');
				</script>";
	}
	if(mysqli_num_rows($resultsnv) == 1){
		while($row = mysqli_fetch_assoc($resultsnv)) {
			if($row['Password'] == $_POST['Password']){
				$_SESSION["usernameadmin"] = $username;
				$url = "fashi/admin.php";		
				header('Location:../'.$url);
			}else {
				echo "
				<script>
					 alert('Mat khau khong dung!!');
				</script>";
			}
			
		}
	}
}


if(mysqli_num_rows($results) == 1){
	while($row = mysqli_fetch_assoc($results)) {
		if($row['Password'] == $_POST['Password']){
			$_SESSION["username"] = $username;
			$url = "fashi/index.php";		
			header('Location:../'.$url);
		}else {
			echo "
			<javascript>
			 	alert('Mat khau khong dung!!');
			</javacript>";
		}
		
	}
}

	

}
?>