 
    <!-- top Products -->
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <!-- tittle heading -->
        
            <!-- //tittle heading -->
            <div class="row">
                <!-- SẢN PHẨM -->
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                        <?php 
                            $sql_tingiaodich = mysqli_query($con, "SELECT * FROM giaodich WHERE ((magiaodich= 1 )  or (magiaodich=2 ) or (magiaodich = 3) or (magiaodich = 6)) ORDER BY magiaodich ASC");
                            while($row_tingiaodich = mysqli_fetch_array($sql_tingiaodich))


                            {
                                 $magiaodich = $row_tingiaodich['magiaodich']
                                 
                        ?>
                        <!-- first section -->
                        <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" >
                            <h3 class="heading-tittle text-center font-italic"><?php echo $row_tingiaodich['loaigiaodich'] ?></h3>
                            <div class="row">
                                <?php

                                    $sql_tinbds = mysqli_query($con, "SELECT * FROM tinbds, tentp WHERE tinbds.mattp = tentp.mattp ORDER BY tinbds.mabds DESC LIMIT 15");
                                    while($row_tin = mysqli_fetch_array($sql_tinbds)){
                                        if($row_tin['magiaodich']==$magiaodich ){
                                ?>
                                <div class="col-md-4 product-men mt-5 ">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img style="width:260px; height:300px"class="img" src="uploads/<?php echo $row_tin['hinhanh']?>" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="?quanly=chitiettin&id=<?php echo $row_tin['mabds'] ?>" class="link-product-add-cart">Xem tin</a>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="?quanly=chitiettin&id=<?php echo $row_tin['mabds'] ?>"><?php echo $row_tin['tieude']?></a>
                                            </h4>
                                                    <?php
                                                    $id=$row_tin['mabds'];

                        $sql_donvichitiet = mysqli_query($con, "SELECT * FROM  tinbds, donvi WHERE tinbds.madonvi = donvi.madonvi and tinbds.mabds = '$id' ");
                        $row_donvi = mysqli_fetch_array($sql_donvichitiet)
                         ?> 
                                            <div class="info-product-price my-2">
                                                <span class="item_price"><?php echo $row_tin['gia']?> <?php echo $row_donvi['tendonvi']?></span>
                                            </div>
                                         
                                            <div>
                                                <span> <?php echo $row_tin['tenttp']?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php
                            }
                                    
                                    }
                                ?>                           
                            </div>
                        </div>

                        <!-- //first section -->
                        <?php 
                             }
                    ?>
                     
                       
                        <div class="product-sec1 product-sec2 px-sm-5 px-3 ">
                           

                            <div class="row">

                                <h3 class="col-md-4 effect-bg center ">Bảng tin</h3>

                                <p style="color:white">Cập nhật tin tức mới nhất thị trường Bất động sản</p>
                                 <?php
                                    $sql_tintuc = mysqli_query($con, "SELECT * FROM tintuc ORDER BY matintuc DESC");
                                    while($row_tintuc = mysqli_fetch_array($sql_tintuc)){
                                ?>
                               
                                <div class="col-md-4 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img style="width:250px; height:300px "class="img" src="uploads/<?php echo $row_tintuc['hinh']?>" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="trangchu.php?quanly=chitiettintuc&id_tin=<?php echo $row_tintuc['matintuc']?>" <?php echo $row_tintuc['tieude']?>class="link-product-add-cart" ></a>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 class="pt-1">
                                                <a href="trangchu.php?quanly=chitiettintuc&id_tin=<?php echo $row_tintuc['matintuc']?>"> <?php echo $row_tintuc['tieude']?></a>
                                            </h4>

                                            
                                            
                                        </div>
                                    </div>
                                </div>  

                             <?php
                        }
                            ?>
                                
                            </div>
                         
                        </div>
                    </div>
                </div>
          

                <!-- product right -->
                <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                    <div class="side-bar p-sm-4 p-3">
                        <div class="search-hotel border-bottom py-2">
                             
                            <h3 class="agileits-sear-head mb-3">Tìm tin</h3>
                            <form action="trangchu.php?quanly=timkiem2" method="POST">
                                <input style = "color:black" type="search" placeholder="Địa điểm..." name="search_diadiem" required="">
                                <input type="submit" value="Tìm" name="search_2">
                            </form>
                        </div>

                        <div class="range border-bottom py-2">
                            <h3 class="agileits-sear-head mb-3">Xem tin theo khu vực</h3>
                            <div class="w3l-range">
                                <ul>
                                    <?php 
                                  $sql_sidebar = mysqli_query($con, 'SELECT  * FROM tentp ORDER BY mattp ASC');
                                    while ($row_sidebar = mysqli_fetch_array($sql_sidebar)) {
                                      
                                  
                                    ?>
                                    <li>
                                        <a href="danhsachtin.php?id=<?php echo $row_sidebar['mattp']?>"><?php echo $row_sidebar['tenttp'] ?></a>
                                    </li>
                                  <?php
                                 }
                                  ?>
                                </ul>
                            </div>
                        </div>
                        <!-- khu vực -->
                        <div class="qc">
                                <?php 
                                  $sql_qc = mysqli_query($con, 'SELECT  * FROM quangcao WHERE trangthai = 1 ORDER BY maqc ASC');
                                    while ($row_qc = mysqli_fetch_array($sql_qc)) {
                                      
                                  
                                    ?>

                            <img style="width:250px;position:center" src="img/banner_310_bandcgiatot.gif" />
                            <?php
                        }
                            ?>
                        </div>
                       
                        <!-- //arrivals -->
                        <!-- best seller -->
                        <div class="f-grid py-2">
                            <h3 class="agileits-sear-head mb-3">Tin mới đăng</h3>
                                  <?php
                                    $sql_tintuc = mysqli_query($con, "SELECT * FROM tinbds ORDER BY mabds DESC LIMIT 15");
                                    while($row_tintuc = mysqli_fetch_array($sql_tintuc)){
                                ?>
                               
                                <div class="col-md-4 product-men mt-5">
                                    <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img style="width:150px; height:70px"class="img" src="uploads/<?php echo $row_tintuc['hinhanh']?>" alt="">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <a href="?quanly=chitiettin&id=<?php echo $row_tintuc['mabds'] ?>">" class="link-product-add-cart">Xem tin</a>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="item-info-product text-center border-top mt-4">
                                            <h4 style="width:150px; height:70px" class="pt-1">
                                                <a style="color:blue" href="?quanly=chitiettin&id=<?php echo $row_tintuc['mabds'] ?>"><?php echo $row_tintuc['tieude']?></a>
                                            </h4>

                                            
                                            
                                        </div>
                                    </div>
                                </div>  

                             <?php
                        }
                            ?>
                  
                        </div>
                        <!-- //best seller -->
                    </div>
                    <!-- //product right -->
                </div>
            </div>
        </div>
    </div>