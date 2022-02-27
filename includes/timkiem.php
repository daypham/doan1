      <?php 
            $sql_tentp = mysqli_query($con, 'SELECT  * FROM tentp ORDER BY mattp DESC');
            $sql_loaigd = mysqli_query($con, 'SELECT  * FROM giaodich ORDER BY magiaodich DESC');
            $sql_timgia = mysqli_query($con, 'SELECT  * FROM timtheogia ORDER BY idtimgia ASC');
            $sql_timdt = mysqli_query($con, 'SELECT  * FROM timtheodt ORDER BY idtimdt ASC');
             $sql_huongnha = mysqli_query($con, 'SELECT  * FROM huongnha ORDER BY mahuong ASC');
                $sql_bangso = mysqli_query($con, 'SELECT  * FROM bangso ORDER BY idso ASC');
                     $sql_bangso2 = mysqli_query($con, 'SELECT  * FROM bangso ORDER BY idso ASC');

        ?>
   
<!-- header-bottom-->
    <div class="header-bot">
        <div class="container">
           
            <div class="row header-bot_inner_wthreeinfo_header_mid">
                <!-- logo -->
                <div class="col-md-3 logo_agile">
                    <h1 class="text-center">
                        <a href="trangchu.php" class="font-weight-bold font-italic">
                            <img style="width:90px; text-align:center" src="img/logo6.jpg" alt=" " class="img-fluid">BDS NgocDay
                        </a>
                    </h1>
                </div>
                <!-- //logo -->
                <!-- header-bot -->
                <div class="col-md-9 header mt-4 mb-md-0 mb-4">
                    <div class="row">
                        <!-- search -->

        
                       <div class="col-10 agileits_search">

                            <form class="form-inline" action="trangchu.php?quanly=timkiem" method="POST">

                        <select style=" width:170px" id="agileinfo-nav_search" name = "search_tinh" class="border"  required="">
                            <option value="0" >Tất cả thành phố</option>
                            <?php 
                                while($row_tentp = mysqli_fetch_array($sql_tentp)) {
                            ?>
                            <option  value="<?php echo $row_tentp['mattp']?>"><?php echo $row_tentp['tenttp']?></option>
                           <?php
                                }
                            ?>
                        </select>

                            <select style=" width:150px" id="agileinfo-nav_search"  name="search_giaodich" class="border" required="">
                            <option value="0" >Tất cả loại tin</option>
                            <?php 
                                while($row_giaodich = mysqli_fetch_array($sql_loaigd))  {
                            ?>
                            <option  value="<?php echo $row_giaodich['magiaodich']?>"><?php echo $row_giaodich['loaigiaodich']?></option>
                           <?php
                                }
                            ?>
                        </select>

                        <select style=" width:170px" id="agileinfo-nav_search" class="border"  name="search_timgia"   required="">
                            <option value="0" >Tất cả mức giá</option>
                            <?php 
                                while($row_timgia = mysqli_fetch_array($sql_timgia))  {
                            ?>
                            <option value="<?php echo $row_timgia['mucgia']?>"> Dưới <?php echo $row_timgia['mucgia']?>  Tỷ</option>
                           <?php
                                }
                            ?>
                        </select>

                        <select style=" width:170px" id="agileinfo-nav_search"  class="border" name = "search_timdt" required="" >
                            <option value="0" >Tất cả diện tích</option>
                            <?php 
                                while($row_timdt = mysqli_fetch_array($sql_timdt))  {
                            ?>
                            <option  value="<?php echo $row_timdt['dientich']?>"> Dưới <?php echo $row_timdt['dientich']?> m2</option>
                           <?php
                                }
                            ?>
                        </select>
                        <p  style=" width:170px; color:black; text-align:center"> Tìm nâng cao </p>


                             <select style=" width:150px" id="agileinfo-nav_search"  class="border" name = "search_huongnha" required="">
                            <option value="0" >Hướng nhà</option>
                            <?php 
                                while($row_huongnha = mysqli_fetch_array($sql_huongnha))  {
                            ?>
                            <option  value="<?php echo $row_huongnha['mahuong']?>"> <?php echo $row_huongnha['tenhuong']?></option>
                           <?php
                                }
                            ?>
                        </select>


                             <select style=" width:170px" id="agileinfo-nav_search"  class="border" name = "search_pngu" required="">
                            <option value="0" >Số phòng ngủ</option>
                            <?php 
                                while($row_bangso = mysqli_fetch_array($sql_bangso)){
                            ?>
                            <option  value="<?php echo $row_bangso['so']?>"><?php echo $row_bangso['so']?></option>
                           <?php
                       }
                           ?>
                       </select>

                         


                    



                           



                           

                     
                                <button style=" width:165px"  class="btn my-2 my-sm-0" name="search_button" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <!-- //search -->
                       
                    </div>
                </div>
            </div>
        </div>
    </div>