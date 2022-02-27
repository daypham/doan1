<?php

if(isset($_POST['dangnhap_home'])){
	$taikhoan = $_POST['email_login'];
	$matkhau = md5($_POST['password_login']);
	if($taikhoan=='' || $matkhau == ''){
		echo '<script>alert("Làm ơn không bỏ trống")</script>';
	}else{
		$sql_seclect_admin = mysqli_query($con, "SELECT * FROM thanhvien WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1" );
		$count = mysqli_num_rows($sql_seclect_admin);
		$row_dangnhap = mysqli_fetch_array($sql_seclect_admin);
		if($count>0){
			$_SESSION['dangnhap_home'] = $row_dangnhap['tenthanhvien'];
			$_SESSION['iduser'] = $row_dangnhap['iduser'];
			header('Location: trangchu2.php');
			
		}else{
			echo '<script>alert("Tài khoản mật hoặc mật khẩu sai")</script>';
		}
		

	}
}
?>
<?if(isset($_GET['dangxuat'])){
  $id=$_GET['dangxuat'];
  if($id==1){
  unset($_SESSION['dangnhap_home']);
    }

   }
  
?> 
<!-- top-header -->
	<!-- Button trigger modal(select-location) -->
	



	<!-- //modal -->
	<!-- //top-header -->


	</div>


<div class="navbar-inner">
	 <?php 
if(isset($_SESSION['dangnhap_home'])){
  echo'<p style="color:black" class="email">Xin chào bạn: '.$_SESSION['dangnhap_home']. '  <a href="trangchu.php?quanly=dangtin&dangxuat=1">Đăng xuất </a></p>';
}else{
  echo '';
}
?>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">

						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="trangchu2.php">Trang chủ
							</a>
						</li>
						
							<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Đăng tin
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="trangchu2.php?quanly=dangtinnha">Đăng bán nhà</a>
								<a class="dropdown-item" href="trangchu2.php?quanly=dangtindat">Đăng bán đất</a>
								<a class="dropdown-item" href="trangchu2.php?quanly=dangtinmua">Đăng tin mua</a>
	
							</div>
						</li>
					
						

						<li class="nav-item">
							<a class="nav-link" href="trangchu2.php?quanly=quanlytaikhoan" method="post">Tài khoản</a>
						</li>
						 <?php 
                            $sql_tingiaodich = mysqli_query($con, 'SELECT * FROM giaodich ORDER BY magiaodich ASC ');
                            while($row_tingiaodich = mysqli_fetch_array($sql_tingiaodich))


                            {
                                 $magiaodich = $row_tingiaodich['magiaodich']
                                 
                        ?>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="?quanly=danhmuc&id=<?php echo $row_tingiaodich['magiaodich']?>"><?php echo $row_tingiaodich['loaigiaodich']?></a>
						</li>


						<?php
					}
						?>
						
					</ul>
				</div>
			</nav>
		</div>
	</div>