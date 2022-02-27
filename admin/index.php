<?php
	session_start();
include('../db/connect.php') 
?>
<?php
if(isset($_POST['dangnhap'])){
	$taikhoan = $_POST['taikhoan'];
	$matkhau = md5($_POST['matkhau']);
	if($taikhoan=='' || $matkhau == ''){
		echo '<p>Xin nhập đủ thông tin </p>';
	}else{
		$sql_seclect_admin = mysqli_query($con, "SELECT * FROM admin WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1" );
		$count = mysqli_num_rows($sql_seclect_admin);
		$row_dangnhap = mysqli_fetch_array($sql_seclect_admin);
		if($count>0){
			$_SESSION['dangnhap'] = $row_dangnhap['tenadmin'];
			$_SESSION['idamin'] = $row_dangnhap['idadmin'];
			header('Location: dashboard.php');
		}else{
			echo '<p>Tài khoản hoặc mật khẩu không đúng</p>';
		}
		

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Đăng nhập Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<h2 style="margin-left:600px"> Đăng nhập </h2>
	<div class="col-md-6">
		<div class="form-group">
			<form style="margin-left:600px"action="" method="POST">
			<lable>Tài khoản</lable>
			<input type="text" name="taikhoan" placeholder="Điền Email" class="form-control"> </br>
			<lable>Mật khẩu</lable>
			<input type="password" name="matkhau" placeholder="Điền mật khẩu" class="form-control"> </br>
			<input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin"> </br>
		</form>
		</div>
	</div>

</body>
</html>