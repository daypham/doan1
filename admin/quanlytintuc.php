<?php
  include('../db/connect.php');
?>

<?php
  if(isset($_POST['themtin'])){
    $tieude = $_POST['tieude'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $noidung = $_POST['noidung'];
    
    $path = '../uploads/';
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_tinbsd = mysqli_query($con,"INSERT INTO tintuc(tieude, hinh, noidung) values ('$tieude','$hinhanh','$noidung')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
  }elseif(isset($_POST['capnhattintuc'])) {
    $id_up = $_POST['id_up']; 
   $tieude = $_POST['tieude'];
   $noidung = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];
    
    $path = '../uploads/';
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    $sql_update_image = "UPDATE tintuc SET tieude='$tieude',hinh='$hinhanh', noidung='$noidung' WHERE matintuc='$id_up '";
     mysqli_query($con,$sql_update_image);
    }
   
  
?> 
<?php
  if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tintuc WHERE matintuc='$id'");
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quản lý tin tức</title>
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
    <?php
      if(isset($_GET['quanly'])=='capnhat'){
        $id_capnhat = $_GET['idtin'];
        $sql_capnhat = mysqli_query($con,"SELECT * FROM tintuc WHERE matintuc='$id_capnhat'");
        $row_capnhat = mysqli_fetch_array($sql_capnhat);
        ?>
        <div class="col-md-4">
        <h4>Cập nhật tin tức</h4>
          
           <form action="" method="POST" enctype="multipart/form-data">
          <label>Tiêu đề tin</label>
          <input type="text" class="form-control" name="tieude" value="<?php echo $row_capnhat['tieude']?>"><br>
          <input type="hidden" class="form-control" name="id_up" value="<?php echo $row_capnhat['matintuc'] ?>">
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          <img src="../uploads/<?php echo $row_capnhat['hinh'] ?>" height="80" width="80"><br>
           <label>Nội dung</label>
          <textarea class="form-control" rows="10" name="mota"> <?php echo $row_capnhat['noidung']?></textarea> <br>
            
          <input type="submit" name="capnhattintuc" value="Cập nhật" class="btn btn-default">
        </form>
        </form>
        </div>

      <?php
      }else{
        ?> 
        <div class="col-md-4">
        <h4>Thêm tin tức</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Tiêu đề tin</label>
          <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề tin"><br>
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          <label>Nội dung</label>
            <textarea class="form-control" rows="10" name="noidung"></textarea><br>
          <input type="submit" name="themtin" value="Thêm tin" class="btn btn-default">
        </form>
        </div>
        <?php
      }
      
      
        ?>
      <div class="col-md-8">
        <h4>Liệt kê tin tức</h4>
        <?php
        $sql_select_tin = mysqli_query($con,"SELECT * FROM tintuc ORDER BY matintuc DESC"); 
        ?> 
        <table class="table table-bordered ">
          <tr>
            <th>Thứ tự</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
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
            <td><img src="../uploads/<?php echo $row_tin['hinh'] ?>" height="100" width="80"></td>

            <td><a href="?xoa=<?php echo $row_tin['matintuc'] ?>">Xóa</a> || <a href="quanlytintuc.php?quanly=capnhat&idtin=<?php echo $row_tin['matintuc'] ?>">Cập nhật</a></td>
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