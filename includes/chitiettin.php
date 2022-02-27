	<!-- Single Page -->
	<?php 
							if(isset($_GET['id'])){
								$id=$_GET['id'];
							}else{
								$id='';
							}
                            $sql_chitiet = mysqli_query($con, "SELECT * FROM tinbds WHERE mabds = '$id'");

                            while ($row_chitiet = mysqli_fetch_array($sql_chitiet)){
                            	$row_temp = $row_chitiet['magiaodich'];
                       				
      ?>
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>hi
				<span>T</span>iết
				<span>T</span>in
			</h3>
			<!-- //tittle heading -->

			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
							<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="uploads/<?php echo $row_chitiet['hinhanh']?>">
									<div class="thumb-image">
										<img src="uploads/<?php echo $row_chitiet['hinhanh']?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
							
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
					</div>
				</div>
				<?php
				if($row_temp == 1 || $row_temp==2){
				?>
				
				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['tieude']?></h3>
						</p class="mb-3">

					
						<?php
						if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
						$sql_diachi = mysqli_query($con, "SELECT * FROM  tinbds, tentp WHERE tinbds.mattp = tentp.mattp and tinbds.mabds = '$id' ");
						while($row_diachi = mysqli_fetch_array($sql_diachi)){
						 ?> 
						
						<span >Địa chỉ: <?php echo $row_diachi['duong']?>  <?php echo $row_diachi['phuong']?> <?php echo $row_diachi['tenttp']?> </span>
						<?php
					}
						?>
					<p class="mb-3">
						<?php
						if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
						$sql_donvichitiet = mysqli_query($con, "SELECT * FROM  tinbds, donvi WHERE tinbds.madonvi = donvi.madonvi and tinbds.mabds = '$id' ");
						while($row_donvi = mysqli_fetch_array($sql_donvichitiet)){
						 ?> 
						
						<span class="item_price">Giá: <?php echo $row_chitiet['gia']?>  <?php echo $row_donvi['tendonvi']?> </span>
						<?php
					}
						?>


					</p>
					<p class="mb-3">
						<span class="item_price">Ngày đăng: <?php echo $row_chitiet['ngaydangtin']?></span>

				

					
					<p class="mb-3">
						<span style="color:black" class="">Diện tích nền: <?php echo $row_chitiet['dientichnen']?> m2 - </span>
						<span style="color:black" class="">Diện tích: <?php echo $row_chitiet['dientich']?> m2</span>

					</p>

						<?php
				if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
					 $sql_huongnha = mysqli_query($con, "SELECT * FROM  tinbds, huongnha WHERE tinbds.mahuong = huongnha.mahuong  and tinbds.mabds = '$id' ");
                            while ($row_huongnha = mysqli_fetch_array($sql_huongnha)){
					?>
					<p class="mb-3">
						<span style="color:black" class="">Hướng nhà: <?php echo $row_huongnha['tenhuong']?></span>

					</p>
					<?php
				}
					?>



					<p class="mb-3">
						<span style="color:black" class="">Số tầng: <?php echo $row_chitiet['sotang']?> - </span>
							<span style="color:black" class="">Số phòng ngủ: <?php echo $row_chitiet['pngu']?> - </span>
							<span style="color:black" class="">Số phòng tắm: <?php echo $row_chitiet['ptam']?></span>

					</p>

				

			
					<div class="product-single-w3l">
					<p>
						<b>Thông tin mô tả: </b>
					</br>
						<?php echo $row_chitiet['mota']?>
					</p>

										</div>
										<?php

									}else if($row_temp == 3 || $row_temp==4){

										?>
											<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $row_chitiet['tieude']?></h3>
						<p class="mb-3">
						<?php
						if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
						$sql_donvichitiet = mysqli_query($con, "SELECT * FROM  tinbds, donvi WHERE tinbds.madonvi = donvi.madonvi and tinbds.mabds = '$id' ");
						while($row_donvi = mysqli_fetch_array($sql_donvichitiet)){
						 ?> 
						
						<span class="item_price">Giá: <?php echo $row_chitiet['gia']?>  <?php echo $row_donvi['tendonvi']?> </span>
						<?php
					}
						?>


					</p>
					<p class="mb-3">
						<span class="item_price">Ngày đăng: <?php echo $row_chitiet['ngaydangtin']?></span>

					</p>
					<p class="mb-3">
						<span style="color:black" class="">Diện tích: <?php echo $row_chitiet['dientich']?></span>

					</p>
					<p class="mb-3">
						<span style="color:black" class="">Loại đất: <?php echo $row_chitiet['loaidat']?></span>

					</p>

						<?php
				if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
					 $sql_huongnha = mysqli_query($con, "SELECT * FROM  tinbds, huongnha WHERE tinbds.mahuong = huongnha.mahuong  and tinbds.mabds = '$id' ");
                            while ($row_huongnha = mysqli_fetch_array($sql_huongnha)){
					?>
					<p class="mb-3">
						<span style="color:black" class="">Hướng nhà: <?php echo $row_huongnha['tenhuong']?></span>

					</p>
					<?php
				}
					?>



		
			
					<div class="product-single-w3l">
					<p>
						<b>Thông tin mô tả: </b>
					</br>
						<?php echo $row_chitiet['mota']?>
					</p>

										</div>
										<?php
									}else{
										?>
									

																<div class="col-lg-7 single-right-left simpleCart_shelfItem">
									
					<h3 class="mb-3"><?php echo $row_chitiet['tieude']?></h3>
						<p class="mb-3">
						<?php
						if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
						$sql_donvichitiet = mysqli_query($con, "SELECT * FROM  tinbds, donvi WHERE tinbds.madonvi = donvi.madonvi and tinbds.mabds = '$id' ");
						while($row_donvi = mysqli_fetch_array($sql_donvichitiet)){
						 ?> 
						
						<span class="item_price">Giá: <?php echo $row_chitiet['gia']?>  <?php echo $row_donvi['tendonvi']?> </span>
						<?php
					}
						?>


					</p>
					<p class="mb-3">
						<span class="item_price">Ngày đăng: <?php echo $row_chitiet['ngaydangtin']?></span>

					</p>
					<p class="mb-3">
						<span style="color:black" class="">Diện tích: <?php echo $row_chitiet['dientich']?></span>

					</p>
					

			


		
			
					<div class="product-single-w3l">
					<p>
						<b>Thông tin mô tả: </b>
					</br>
						<?php echo $row_chitiet['mota']?>
					</p>

										</div>
										<?php
									}
										?>



					<div class="product-single-w3l">
					<p>
						<b> Thông tin liên hệ: </b>
					</br>
						
					</p>
					<?php
					if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
					 $sql_lienhe = mysqli_query($con, "SELECT * FROM  tinbds, thanhvien WHERE tinbds.iduser = thanhvien.iduser and tinbds.mabds = '$id' ");
                            while ($row_lienhe = mysqli_fetch_array($sql_lienhe)){
					?>
					<p> Tên: <?php echo $row_lienhe['tenthanhvien']?> </p>
					<p> Địa chỉ: <?php echo $row_lienhe['diachi']?> </p>
					<p> Email: <?php echo $row_lienhe['email']?> </p>
					<p> Điện thoại: <?php echo $row_lienhe['dienthoai']?> </p>
					<?php
				}
					?>
					</div>
					
			</div>
		</div>
	</div>
	<?php
}
	?>