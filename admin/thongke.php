<?php
  include('../db/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quản lý tin</title>
  <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
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
          <a class="nav-link" href="quanlyphanhoi.php">Phản hồi </a>
        </li>
         </li>
              <li class="nav-item">
          <a class="nav-link" href="xulytinvipham.php">Xử lý tin vi phạm</a>
          
        </li>
        </li>
              <li class="nav-item">
          <a class="nav-link" href="thongke.php">Thống kê</a>
          
        </li>
        
      </ul>
    </div>
  </div>
</nav><br><br>
  <div class="container">
    <div class="row">
   
      <div class="col-md-8">
        <h4>Thống kê</h4>
        <?php
        $sql_demtin = mysqli_query($con,"SELECT 'soluong', COUNT(mabds) AS 'soluong2' FROM tinbds");
        $row_demtin = mysqli_fetch_array($sql_demtin);
        $demtin = $row_demtin['soluong2'];

        $sql_demnha = mysqli_query($con,"SELECT 'soluong', COUNT(magiaodich) AS 'soluong3' FROM tinbds WHERE magiaodich = 1 OR magiaodich=2");
        $row_demnha = mysqli_fetch_array($sql_demnha);
        $demnha = $row_demnha['soluong3'];


        $sql_demdat = mysqli_query($con,"SELECT 'soluong', COUNT(magiaodich) AS 'soluong4' FROM tinbds WHERE magiaodich = 3 OR magiaodich=4");
        $row_demdat = mysqli_fetch_array($sql_demdat);
        $demdat = $row_demdat['soluong4'];


         $sql_demmua = mysqli_query($con,"SELECT 'soluong', COUNT(magiaodich) AS 'soluong4' FROM tinbds WHERE magiaodich = 6");
        $row_demmua = mysqli_fetch_array($sql_demmua);
        $demmua = $row_demmua['soluong4'];

           $sql_demtv = mysqli_query($con,"SELECT 'soluong', COUNT(iduser) AS 'soluong4' FROM thanhvien ");
        $row_demtv = mysqli_fetch_array($sql_demtv);
        $demtv = $row_demtv['soluong4'];





        if(isset($_POST['loc'])){
          $ngayloc = $_POST['ngay'];

          $sql_demngay = mysqli_query($con,"SELECT 'soluong', COUNT(mabds) AS 'soluong5' FROM tinbds WHERE ngaydangtin LIKE '%$ngayloc%' ");
        $row_demngay = mysqli_fetch_array($sql_demngay);
        $demngay = $row_demngay['soluong5'];

        $sql_demngay2 = mysqli_query($con,"SELECT 'soluong', COUNT(mabds) AS 'soluong5' FROM tinbds WHERE ngaydangtin LIKE '%$ngayloc%' AND (magiaodich = 1 OR magiaodich =2) ");
        $row_demngay2 = mysqli_fetch_array($sql_demngay2);
        $demngay2 = $row_demngay2['soluong5'];

          $sql_demngay3 = mysqli_query($con,"SELECT 'soluong', COUNT(mabds) AS 'soluong5' FROM tinbds WHERE ngaydangtin LIKE '%$ngayloc%' AND (magiaodich = 3 OR magiaodich =4) ");
        $row_demngay3 = mysqli_fetch_array($sql_demngay3);
        $demngay3 = $row_demngay3['soluong5'];

          $sql_demngay4 = mysqli_query($con,"SELECT 'soluong', COUNT(mabds) AS 'soluong5' FROM tinbds WHERE ngaydangtin LIKE '%$ngayloc%' AND (magiaodich = 6) ");
        $row_demngay4 = mysqli_fetch_array($sql_demngay4);
        $demngay4 = $row_demngay4['soluong5'];

        }
        ?>


        <table class="table table-bordered ">
          <tr>
      
            <th>Tổng tin</th>
            <th >Tổng tin nhà</th>
            <th>Tổng tin đất</th>
            <th>Tổng tin đăng mua</th>
            <th>Tổng người đăng ký</th>
          
          </tr>
          
          <tr>
        
            <td><?php echo $demtin ?></td>
            <td><?php echo $demnha ?></td>
            <td><?php echo $demdat ?></td>
             <td><?php echo $demmua ?></td>
             <td><?php echo $demtv ?></td>
            
          </tr>
        
        </table>
      </div>

      <div class="col-md-8">
        <h4>Lọc tin theo ngày đăng</h4>
        <form  action="thongke.php" method="POST" enctype="multipart/form-data" >  
          <input type="date" class="form-control" name="ngay">
          <button class="btn my-2 my-sm-0" name="loc" type="submit">Lộc
          </button>        </form>
      <p> Tổng số tin đăng trong ngày <?php echo $ngayloc?> là <?php echo $demngay?></p>
      <p> Trong đó tin nhà là:  <?php echo $demngay2?> </p>
      <p> Trong đó tin đất là:  <?php echo $demngay3?> </p>
      <p> Trong đó tin mua là:  <?php echo $demngay4?> </p>


      </div>
     
    </div>
  </div>
  
</body>
</html>