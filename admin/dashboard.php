<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	}
?>
<?php
if(isset($_GET['login'])){
	$dangxuat = $_GET['login'];
}
else
{
	$dangxuat='';
}
if($dangxuat == 'dangxuat'){
	unset($_SESSION['dangnhap']);
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcom Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<p>Welcom: <?php echo $_SESSION['dangnhap']?></p>
	<a href="?login=dangxuat">Đăng xuất </a>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <li class="nav-item">
          <a class="nav-link" href="xulytin.php">Quản lý tin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quanlythanhvien.php">Quản lý thành viên</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="quanlytintuc.php">Quản lý tin tức</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Quản lý quảng cáo</a>
        </li>
                <li class="nav-item">
          <a class="nav-link" href="quanlyphanhoi.php">Phản hồi	</a>

        </li>
        
        </li>
                <li class="nav-item">
          <a class="nav-link" href="xulytinvipham.php">Xử lý tin vi phạm</a>
          
        </li>


      </ul>
    </div>
  </div>
</nav>

</body>
</html>