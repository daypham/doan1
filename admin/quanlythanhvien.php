<?php
  include('../db/connect.php');
?>
<?php
  if(isset($_POST['themtv'])){
  $tenthanhvien = $_POST['tenthanhvien'];
  $dienthoai = $_POST['dienthoai'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $diachi = $_POST['diachi'];
    
    $sql_insert_thanhvien = mysqli_query($con, "INSERT INTO thanhvien(password, tenthanhvien, diachi, email, dienthoai) values ('$password', '$tenthanhvien', '$diachi' , '$email', '$dienthoai') ");
  }elseif(isset($_POST['capnhattv'])) {
    $id_up = $_POST['id_up']; 
    $tenthanhvien = $_POST['tenthanhvien'];
  $dienthoai = $_POST['dienthoai'];
  $diachi = $_POST['diachi'];
    
    
      $sql_update_tv = "UPDATE thanhvien SET tenthanhvien='$tenthanhvien',diachi='$diachi',dienthoai='$dienthoai' WHERE iduser=$id_up";
    
    mysqli_query($con,$sql_update_tv);
  }
  
?> 
<?php
  if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM thanhvien WHERE iduser='$id'");
  } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quản lý thành viên</title>
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
    <?php
      if(isset($_GET['quanly'])=='capnhat'){
        $id_capnhat = $_GET['id_tv'];
        $sql_capnhat = mysqli_query($con,"SELECT * FROM thanhvien WHERE iduser='$id_capnhat'");
        $row_capnhat = mysqli_fetch_array($sql_capnhat);
        ?>
        <div class="col-md-4">
        <h4>Cập nhật thành viên</h4>
        
           <form action="" method="POST" enctype="multipart/form-data">
          <label>Tên thành viên</label>
          <input type="text" class="form-control" name="tenthanhvien" value="<?php echo $row_capnhat['tenthanhvien']?>"><br>
          <input type="text" class="form-control" name="id_up" value="<?php echo $row_capnhat['iduser'] ?>">
          
           <label>Địa chỉ</label>
          <input type="text" class="form-control" name="diachi"  value="<?php echo $row_capnhat['diachi']?>"><br>
          <label>Điện thoại</label>
          <input type="text" class="form-control" name="dienthoai" value="<?php echo $row_capnhat['dienthoai']?>"><br>
        
           
          <input type="submit" name="capnhattv" value="Cập nhật" class="btn btn-default">
        </form>
        </div>
      <?php
      }else{
        ?> 
        <div class="col-md-4">
        <h4>Thêm thành viên</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Tên thành viên</label>
          <input type="text" class="form-control" name="tenthanhvien" placeholder="Tên thành viên"><br>
          <label>Email</label>
          <input type="text" class="form-control" name="email" placeholder="Email thành viên"><br>
            <label>Địa chỉ</label>
          <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ"><br>
            <label>Mật khẩu</label>
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu"><br>
            <label>Số điện thoại</label>
          <input type="text" class="form-control" name="dienthoai" placeholder=""><br>
           
          <input type="submit" name="themtv" value="Thêm thành viên" class="btn btn-default">
        </form>
        </div>
        <?php
      }
      
      
        ?>
      <div class="col-md-8">
        <h4>Liệt kê thành viên</h4>
        <?php
        $sql_select_tv = mysqli_query($con,"SELECT * FROM thanhvien ORDER BY iduser DESC"); 
        ?> 
        <table class="table table-bordered ">
          <tr>
            <th>Thứ tự</th>
            <th>Tên thành viên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i = 0;
          while($row_tv = mysqli_fetch_array($sql_select_tv)){ 
            $i++;
          ?> 
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row_tv['tenthanhvien'] ?></td>
            <td><?php echo $row_tv['email'] ?></td>
            <td><?php echo $row_tv['diachi'] ?></td>
             <td><?php echo $row_tv['dienthoai'] ?></td>
            <td><a href="?xoa=<?php echo $row_tv['iduser'] ?>">Xóa</a> || <a href="quanlythanhvien.php?quanly=capnhat&id_tv=<?php echo $row_tv['iduser'] ?>">Cập nhật</a></td>
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