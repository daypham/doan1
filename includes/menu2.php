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
elseif(isset($_POST['dangky'])){

	$tenthanhvien = $_POST['tenthanhvien'];
	$dienthoai = $_POST['dienthoai'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$diachi = $_POST['diachi'];
	$sql_thanhvien = mysqli_query($con, "INSERT INTO thanhvien(password, tenthanhvien, diachi, email, dienthoai) values ('$password', '$tenthanhvien', '$diachi' , '$email', '$dienthoai') ");
	$sql_select_thanhvien = mysqli_query($con, "SELECT * FROM thanhvien ORDER BY iduser DESC LIMIT 1");
	$ow_thanhvien = mysqli_fetch_array($sql_select_thanhvien);
	$_SESSION['dangnhap_home'] = $tenthanhvien;
	$_SESSION['iduser'] = $row_dangnhap['iduser'];
	header('Location: trangchu2.php');

}
?>
<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					
					
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
					
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0 1231 2321 32
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
					

					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

	<!-- Button trigger modal(select-location) -->
	

	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
						</div>
						
						<p class="text-center dont-do mt-3">Bạn chưa có tài khoản
							<a href="#" data-toggle="modal" data-target="#dangky">
								Đăng ký ngay</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label class="col-form-label">Tên</label>
							<input type="text" class="form-control" placeholder=" " name="tenthanhvien" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu</label>
							<input type="password" class="form-control" placeholder=" " name="password"  required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại</label>
							<input type="text" class="form-control" placeholder=" " name="dienthoai" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ</label>
							<input type="diachi" class="form-control" placeholder=" " name="diachi" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" name="dangky" value="Đăng ký">
						</div>
						<!-- <div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">Đồng ý với các điều khoản</label>
							</div>
						</div> -->
					</form>
				</div>
			</div>

		</div>

	</div>


	<!-- //modal -->
	<!-- //top-header -->


	</div>


<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">

						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="trangchu.php">Trang chủ
							</a>
						</li>
						
						 <?php 
                            $sql_tingiaodich = mysqli_query($con, 'SELECT * FROM giaodich WHERE (magiaodich = 1 or magiaodich = 2 or magiaodich = 3 or magiaodich =6) ORDER BY magiaodich ASC ');
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
						

						<li class="nav-item">
							<a class="nav-link" href="?quanly=tintuc" method="post">Tin tức</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?quanly=phanhoi" method="post">Phản hồi</a>
						</li>
						<li class="nav-item">
							<a  onclick="alert('Bạn cần đăng nhập để sử dụng chức năng này!!!')" class="nav-link" href="" method="post">Đăng tin</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>