
	

	<!-- top Products -->
	<?php 
							if(isset($_GET['id'])){
								$id=$_GET['id'];
							}else{
								$id='';
							}
                            $sql_danhsach = mysqli_query($con, "SELECT * FROM giaodich, tinbds, tentp 
                            WHERE giaodich.magiaodich = tinbds.magiaodich and tinbds.mattp = tentp.mattp and tinbds.magiaodich = '$id'
                            ORDER BY tinbds.mabds DESC ");
                            $sql_danhsach2 = mysqli_query($con, "SELECT * FROM giaodich, tinbds 
                            WHERE giaodich.magiaodich = tinbds.magiaodich and tinbds.magiaodich = '$id'
                            ORDER BY tinbds.mabds DESC ");
     
                            $row_title = mysqli_fetch_array($sql_danhsach2);
                            $title = $row_title['loaigiaodich'];
                        ?>
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<?php echo $title?></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								 <?php
								  while($row_danhsach = mysqli_fetch_array($sql_danhsach)){
								 ?>
								<div class="col-md-4 product-men">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img style="width:260px; height:300px" class="img" src="uploads/<?php echo $row_danhsach['hinhanh']?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitiettin&id=<?php echo $row_danhsach['mabds'] ?>" class="link-product-add-cart">Xem tin</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											
											<h4 class="pt-1">
												<a href="?quanly=chitiettin&id=<?php echo $row_danhsach['mabds'] ?>"><?php echo $row_danhsach['tieude']?></a>
											</h4>
							
											
                                     <?php
                                                    $id=$row_danhsach['mabds'];

                        $sql_donvichitiet = mysqli_query($con, "SELECT * FROM  tinbds, donvi WHERE tinbds.madonvi = donvi.madonvi and tinbds.mabds = '$id' ");
                        $row_donvi = mysqli_fetch_array($sql_donvichitiet)
                         ?> 
                                            <div class="info-product-price my-2">
                                                <span class="item_price"><?php echo $row_danhsach['gia']?> <?php echo $row_donvi['tendonvi']?></span>
                                            </div>
						
										<div class="info-product-price my-2">
												<span ><?php echo $row_danhsach['tenttp']?></span>
											
											</div>


										</div>
									</div>
								</div>
							<?php
								}
							?>
							</div>
						</div>
						<!-- //first section -->
						
						
					</div>
				</div>

				<!-- //product left -->
				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm kiếm</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Search Brand..." name="search" required="">
								<input type="submit" value=" ">
							</form>
							<div class="left-side py-2">
								<ul>
                                    <?php 
                                  $sql_sidebar = mysqli_query($con, 'SELECT  * FROM tentp ORDER BY mattp ASC');
                                    while ($row_sidebar = mysqli_fetch_array($sql_sidebar)) {
                                      
                                  
                                    ?>
                                    <li>
                                        <a style="color:black" href="danhsachtin.php?id=<?php echo $row_sidebar['mattp']?>"><?php echo $row_sidebar['tenttp'] ?></a>
                                    </li>
                                  <?php
                                 }
                                  ?>
                                </ul>
							</div>
						</div>
						
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Dưới 500 triệu</a>
									</li>
						
								</ul>
							</div>
						</div>
					
					
						
						<!-- //arrivals -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
