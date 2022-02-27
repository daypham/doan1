
<?php 
							if(isset($_GET['id_tin'])){
								$id_tintuc=$_GET['id_tin'];
							}else{
								$id_tintuc='';
							}
							?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="trangchu.php">Trang chủ </a>
						<i>|</i>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
		<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>D</span>anh
				<span>M</span>ục
				<span>T</span>in
			</h3>
			<!-- //tittle heading -->
			<div class="row">
				
				<?php
				$sql_tintuc = mysqli_query($con, "SELECT * FROM tintuc ORDER BY matintuc DESC  ");
				while($row_tintuc = mysqli_fetch_array($sql_tintuc)){
				?>
				<div class="col-lg-8 welcome-left">	
				
						<h5><a href = "trangchu.php?quanly=chitiettintuc&id_tin=<?php echo $row_tintuc['matintuc']?>"> <?php echo $row_tintuc['tieude']?> </a> </h5>
					<h4 class="my-sm-3 my-2"><?php echo $row_tintuc['tomtat']?></h4>

				</div>

					<div class="col-lg-3 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="uploads/<?php echo $row_tintuc['hinh']?>" class="img-fluid" alt=" ">
					</br>
					</br>
				
				

			</div>
			</br>
			</br>
			<?php
			} 
			?>
		</div>

		</div>
	</div>