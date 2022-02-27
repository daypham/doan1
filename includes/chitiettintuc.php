
<?php 
							if(isset($_GET['id_tin'])){
								$id_tintuc=$_GET['id_tin'];
							}else{
								$id_tintuc='';
							}
							 $sql_chitiettintuc = mysqli_query($con, "SELECT * FROM tintuc WHERE matintuc = '$id_tintuc'");

                            while ($row_chitiettintuc = mysqli_fetch_array($sql_chitiettintuc)){

						?>

<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="trangchu.php">Trang chủ </a>
						<i>|</i>
					</li>
					<li>
						<?php echo $row_chitiettintuc['tieude']?>
					</li>
					
						
					
					
				</ul>
			</div>
		</div>
	</div>
		<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<h2><?php echo $row_chitiettintuc['tieude']?></h2>
				
				<?php
				$sql_tintuc = mysqli_query($con, "SELECT * FROM tintuc WHERE tintuc.matintuc = '$id_tintuc'  ");
				$row_tintuc = mysqli_fetch_array($sql_tintuc)
				?>
				<div class="col-lg-12 welcome-left">	
				
						<h5> <?php echo $row_tintuc['tieude']?>  </h5>
					

				</div>

					<div class="col-lg-3 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="uploads/<?php echo $row_tintuc['hinh']?>" class="img-fluid" alt=" ">
				
				

			</div>
			<h4 class="my-sm-3 my-2"><?php echo $row_tintuc['noidung']?></h4>
			
		</div>

		</div>
	</div>
	<?php
}
?>