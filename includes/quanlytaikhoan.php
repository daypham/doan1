
<?php

if(isset($_POST['dangnhap_home'])){
  $taikhoan = $_POST['email_login'];
  $matkhau = md5($_POST['password_login']);
  if($taikhoan=='' || $matkhau == ''){
    echo '<script>alert("Làm ơn không bỏ trống")</script>';
  }else{
    $sql_seclect_admin = mysqli_query($con, "SELECT * FROM thanhvien WHERE email='$taikhoan' AND password='$matkhau' LIMIT 1" );
    $count = mysqli_num_rows($sql_seclect_admin);
    $row_dangnhap = mysqli_fetch_array($sql_seclect_admin);
    if($count>0){
      $_SESSION['dangnhap_home'] = $row_dangnhap['email'];
      $_SESSION['iduser'] = $row_dangnhap['iduser'];
      header('Location: trangchu2.php');
      
    }else{
      echo '<script>alert("Tài khoản mật hoặc mật khẩu sai")</script>';
    }
    

  }
}
?>
<?php
if(isset($_POST['capnhattv2'])) {
    $id_up = $_POST['id_up']; 
    $tenthanhvien = $_POST['tenthanhvien'];
  $dienthoai = $_POST['dienthoai'];
  $diachi = $_POST['diachi'];
  $matkhau = $_POST['password'];
  $matkhau_new = md5($_POST['password_new']);
  $matkhau_xn = md5($_POST['password_xn']);
    if($matkhau_new != $matkhau_xn){
      echo '<script>alert("Xác nhận mật khẩu không đúng!!!")</script>';
    }
    if($matkhau_new == ''){
      $sql_update_tv = "UPDATE thanhvien SET tenthanhvien='$tenthanhvien',diachi='$diachi',dienthoai='$dienthoai' WHERE iduser=$id_up";
     mysqli_query($con,$sql_update_tv);
      echo '<script>alert("Cập nhật thành công!!!")</script>';
    }else
    {
      $sql_update_tv_mk = "UPDATE thanhvien SET password = '$matkhau_new',tenthanhvien='$tenthanhvien',diachi='$diachi',dienthoai='$dienthoai' WHERE iduser=$id_up";
         mysqli_query($con,$sql_update_tv_mk);
           echo '<script>alert("Cập nhật thành công!!!")</script>';
    
    }
  }

    
        
    
   
  
?> 

<div class="container">
    <div class="row">
    <?php
      if(isset($_GET['quanly2'])=='capnhat'){
        $id_capnhat = $_GET['id_tv'];
        $sql_capnhat = mysqli_query($con,"SELECT * FROM thanhvien WHERE iduser='$id_capnhat'");
        $row_capnhat = mysqli_fetch_array($sql_capnhat);
        ?>
        <div class="col-md-4">
        <h4>Cập nhật thông tin</h4>
        
           <form action="" method="POST" enctype="multipart/form-data">
          <label>Tên thành viên</label>
          <input type="text" class="form-control" name="tenthanhvien" value="<?php echo $row_capnhat['tenthanhvien']?>"><br>
          <input type="hidden" class="form-control" name="id_up" value="<?php echo $row_capnhat['iduser'] ?>">
          
           <label>Địa chỉ</label>
          <input type="text" class="form-control" name="diachi"  value="<?php echo $row_capnhat['diachi']?>"><br>
          <label>Điện thoại</label>
          <input type="text" class="form-control" name="dienthoai" value="<?php echo $row_capnhat['dienthoai']?>"><br>
           <label>Mật khẩu hiện tại</label>
          <input type="password" class="form-control" name="password" value="<?php echo $row_capnhat['password']?>"><br>
           <label>Mật khẩu mới</label>
          <input type="password" class="form-control" name="password_new"><br>
           <label>Xác nhận mật khẩu mới</label>
          <input type="password" class="form-control" name="password_xn"><br>
           
          <input type="submit" name="capnhattv2" value="Cập nhật" class="btn btn-default">
        </form>
        </div>
      <?php
      }
        ?> 
<div class="col-md-8">
        <h4>Thông tin</h4>
        <?php
        $sql_select_tv = mysqli_query($con,"SELECT * FROM thanhvien ORDER BY iduser DESC");
         while($row_tv = mysqli_fetch_array($sql_select_tv)){
          if($_SESSION['iduser'] == $row_tv['iduser']){

        ?> 
        <table class="table table-bordered ">
          <tr>
            <th>Tên thành viên</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Mật khẩu</th>
            <th>Quản lý</th>
          </tr>
          <?php
          $i = 0;
         
            $i++;
          ?> 
          <tr> 
            <td><?php echo $row_tv['tenthanhvien'] ?></td>
            <td><?php echo $row_tv['email'] ?></td>
            <td><?php echo $row_tv['diachi'] ?></td>
             <td><?php echo $row_tv['dienthoai'] ?></td>
             <td>**************</td>
            <td> <a href="?quanly=quanlytaikhoan&quanly2=capnhat&id_tv=<?php echo $row_tv['iduser'] ?>">Cập nhật</a></td>
          </tr>
        <?php
      }
          } 
          ?> 
        </table>
      </div>
    </div>
  </div>