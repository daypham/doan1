<?php
  include('../db/connect.php');
?>


  
<?php
  if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tinbds WHERE mabds='$id'");
  } 
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
        <h4>Liệt kê tin vi phạm</h4>
        <?php
          $sql_tincam = mysqli_query($con, "SELECT * FROM tucam");
          $row_tincam = mysqli_fetch_array($sql_tincam);
          $tubicam = $row_tincam['tucam']; 
        $sql_select_tin = mysqli_query($con,"SELECT * FROM tinbds WHERE (tieude LIKE '%$tubicam%') OR (mota LIKE '%$tubicam%') ORDER BY tinbds.mabds DESC"); 
        ?> 
        <table class="table table-bordered ">
          <tr>
            <th>Thứ tự</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Tỉnh - thành phố</th>
            <th>Quận huyện</th>
            <th>Phường</th>
            <th>Đường</th>
            <th>Diện tích</th>
            <th>Giá</th>
            <th>Ngày đăng ký</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i = 0;
          while($row_tin = mysqli_fetch_array($sql_select_tin)){ 
            $i++;
          ?> 
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row_tin['tieude'] ?></td>
            <td><img src="../uploads/<?php echo $row_tin['hinhanh'] ?>" height="100" width="80"></td>
            <td><?php echo $row_tin['mattp'] ?></td>
            <td><?php echo $row_tin['quanhuyen'] ?></td>
             <td><?php echo $row_tin['phuong'] ?></td>
              <td><?php echo $row_tin['duong'] ?></td>
               <td><?php echo $row_tin['dientich'] ?></td>
                <td><?php echo $row_tin['gia'] ?></td>
                 <td><?php echo $row_tin['ngaydangtin'] ?></td>
    
            <td><a href="?xoa=<?php echo $row_tin['mabds'] ?>">Xóa</a></a></td>
          </tr>
        <?php
          } 
          ?> 
        </table>
      </div>
    </div>
  </div>
  
</body>
</html>