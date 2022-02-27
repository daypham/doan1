
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


  if(isset($_POST['themtin2'])){
    $tieude = $_POST['tieude'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $donvi = $_POST['madonvi'];
    $iduser = $_SESSION['iduser'];
    $mattp = $_POST['mattp'];
    $mahuong =$_POST['mahuong'];
    $dtnen = $_POST['dientichnen'];
    $sotang = $_POST['sotang'];
    $pngu = $_POST['pngu'];
    $ptam = $_POST['ptam'];
    $quanhuyen = $_POST['quanhuyen'];
    $phuong = $_POST['phuong'];
    $duong = $_POST['duong'];
    $dientich = $_POST['dientich'];
    $gia = $_POST['gia'];
    $magiaodich = $_POST['magiaodich'];
    $mota = $_POST['mota'];
    $path = 'uploads/';

            

    if($tieude =='' || $mattp == '' || $quanhuyen =='' || $phuong=='' || $duong=='' || $dientich=='' || $gia=='' || $mota ==''){
      echo "<script>alert('Xin nhập đủ thông tin!!!')</script>";
    }
    if($tieude == 'hell'){
      echo "<script>alert('Có từ khóa không hợp lệ!!!')</script>";
    }
    else{
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_tinbsd = mysqli_query($con,"INSERT INTO tinbds(tieude,mattp,quanhuyen,phuong,duong,mota,hinhanh,magiaodich,iduser,dientichnen,mahuong,sotang,pngu,ptam,madonvi,gia,dientich) values ('$tieude','$mattp','$quanhuyen','$phuong','$duong','$mota','$hinhanh','$magiaodich', '$iduser','$dtnen','$mahuong','$sotang','$pngu','$ptam', '$donvi', '$gia','$dientich')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);

    echo "<script>alert('Đăng thành công!!!')</script>";
    
  }
}elseif(isset($_POST['capnhattinbds'])) {
    $id_up = $_POST['id_update']; 
   $tieude = $_POST['tieude'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $magiaodich = $_POST['magiaodich'];
    $mattp = $_POST['mattp'];
    $quanhuyen = $_POST['quanhuyen'];
    $phuong = $_POST['phuong'];
    $duong = $_POST['duong'];
    $dientich = $_POST['dientich'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
 

        
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    if($hinhanh==''){
      $sql_update_image = "UPDATE tinbds SET tieude='$tieude',mattp='$mattp',quanhuyen='$quanhuyen',phuong='$phuong',duong='$duong',mota='$mota',magiaodich='$magiaodich', gia='$gia', dientich='$dientich'WHERE mabds=$id_up";
      echo "<script>alert('Cập nhật thành công!!!')</script>";
    }else{
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    $sql_update_image = "UPDATE tinbds SET tieude='$tieude',mattp='$mattp',quanhuyen='$quanhuyen',phuong='$phuong',duong='$duong',dientich='$dientich',gia='$gia',mota='$mota',magiaodich='$magiaodich',hinhanh='$hinhanh' magiaodich='$magiaodich' WHERE mabds=$id_up";
    }
    mysqli_query($con,$sql_update_image);
    echo "<script>alert('Cập nhật thành công!!!')</script>";
  }


?> 



<?php
  if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tinbds WHERE mabds='$id'");
  } 
?>
<div class="container">
    <div class="row">


   <?php
      if(isset($_GET['quanly2'])=='capnhat'){
        $id_capnhat = $_GET['capnhat_id'];
        $sql_capnhat = mysqli_query($con,"SELECT * FROM tinbds WHERE mabds='$id_capnhat'");
        $row_capnhat = mysqli_fetch_array($sql_capnhat);
        $mattp_1 = $row_capnhat['mattp'];
        $magiaodich_1 = $row_capnhat['magiaodich'];
        ?>

        <div class="col-md-4">
        <h4>Cập nhật tin bất động sản</h4>
        
           <form action="" method="POST" enctype="multipart/form-data">
          <label>Tiêu đề tin</label>
          <input type="text" class="form-control" name="tieude" value="<?php echo $row_capnhat['tieude']?>"><br>
          <input type="text" class="form-control" name="id_update" value="<?php echo $row_capnhat['mabds'] ?>">
          <label>Hình ảnh</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          <img src="../uploads/<?php echo $row_capnhat['hinhanh'] ?>" height="80" width="80"><br>

               <label>Loại tin</label>
           <?php 
            $sql_giaodich = mysqli_query($con, 'SELECT  * FROM giaodich');
        ?>
           <select name="magiaodich" class="form-control">
            <?php while($row_giaodich = mysqli_fetch_array($sql_giaodich)){ 
              if($magiaodich_1 == $row_giaodich['magiaodich']){?>
            <option selected value="<?php echo $row_giaodich['magiaodich']?>"><?php echo $row_giaodich['loaigiaodich']?></option>
            <?php
          }else{
            ?>
              <option value="<?php echo $row_giaodich['magiaodich']?>"><?php echo $row_giaodich['loaigiaodich']?></option>
            <?php
          }
          }
            ?>
           </select>
           <?php
           ?>

            <label>Tỉnh - Thành Phố</label>
           <?php 
            $sql_tentp = mysqli_query($con, 'SELECT  * FROM tentp');
        ?>
           <select name="mattp" class="form-control">
            <?php while($row_tenttp = mysqli_fetch_array($sql_tentp)){ 
              if($mattp_1 == $row_tenttp['mattp']){?>
            <option selected value="<?php echo $row_tenttp['mattp']?>"><?php echo $row_tenttp['tenttp']?></option>
            <?php
          }else{
            ?>
              <option value="<?php echo $row_tenttp['mattp']?>"><?php echo $row_tenttp['tenttp']?></option>
            <?php
          }
          }
            ?>
           </select>
           <?php
           ?>
           <label>Quận - Huyện</label>
          <input type="text" class="form-control" name="quanhuyen"  value="<?php echo $row_capnhat['quanhuyen']?>"><br>
          <label>Phường - Khu vực</label>
          <input type="text" class="form-control" name="phuong" value="<?php echo $row_capnhat['phuong']?>"><br>
           <label>Địa chỉ chi tết</label>
          <input type="text" class="form-control" name="duong" value="<?php echo $row_capnhat['duong']?>"><br>
           <label>Diện tích</label>
          <input type="text" class="form-control" name="dientich" value="<?php echo $row_capnhat['dientich']?>"><br>
          <label>Giá</label>
          <input type="text" class="form-control" name="gia" value="<?php echo $row_capnhat['gia']?>"><br>
          <label>Mô tả</label>
          <textarea class="form-control" rows="10" name="mota" > <?php echo $row_capnhat['mota']?></textarea><br>
        
        
          <br>
          <input type="submit" name="capnhattinbds" value="Cập nhật" class="btn btn-default">
        </form>
       
        </div>
      <?php
      }else{
        ?> 
        <div style="margin-left:400px"class="col-md-4">
        <h2 style="color:red" class="heading-tittle text-center font-italic" >Thêm tin bất động sản</h2>
        
        <form action="" method="POST" enctype="multipart/form-data">
                     <label>Loại giao dịch</label>
             <?php 
            $sql_loaigiaodich = mysqli_query($con, 'SELECT  * FROM giaodich WHERE (magiaodich=1 or magiaodich = 2) ORDER BY magiaodich ASC');
        ?>
           <select name="magiaodich" class="form-control">
            <option value="">-----------Chọn loại giao dịch---------------</option>
            <?php while($row_loaigd = mysqli_fetch_array($sql_loaigiaodich)){ ?>
            <option value="<?php echo $row_loaigd['magiaodich']?>"> <?php echo $row_loaigd['loaigiaodich']?> </option>
            <?php
          }
            ?>
           </select>
           <?php
           ?>
          </select><br>
          <label>Tiêu đề tin</label>
          <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề tin"><br>
          <label>Hình ảnh đại diện</label>
          <input type="file" class="form-control" name="hinhanh"><br>
          
              <label>Hướng nhà</label>
           <?php 
            $sql_huongnha = mysqli_query($con, 'SELECT  * FROM huongnha ORDER BY mahuong ASC');
        ?>
           <select name="mahuong" class="form-control">
            <option value="">-----------Chọn hướng nhà---------------</option>
            <?php while($row_huongnha = mysqli_fetch_array($sql_huongnha)){ ?>
            <option value="<?php echo $row_huongnha['mahuong']?>"><?php echo $row_huongnha['tenhuong']?></option>
            <?php
          }
            ?>
           </select>
           <?php
           ?>

            <label>Tỉnh - Thành Phố</label>
           <?php 
            $sql_tentp = mysqli_query($con, 'SELECT  * FROM tentp ORDER BY mattp ASC');
        ?>
           <select name="mattp" class="form-control">
            <option value="">-----------Chọn tỉnh - thành phố---------------</option>
            <?php while($row_tenttp = mysqli_fetch_array($sql_tentp)){ ?>
            <option value="<?php echo $row_tenttp['mattp']?>"><?php echo $row_tenttp['tenttp']?></option>
            <?php
          }
            ?>
           </select>
           <?php
           ?>

           <label>Quận - Huyện</label>
          <input type="text" class="form-control" name="quanhuyen" placeholder="Quận huyện "><br>
          <label>Phường - Xã</label>
          <input type="text" class="form-control" name="phuong" placeholder=""><br>
           <label>Địa chỉ chi tết</label>
          <input type="text" class="form-control" name="duong" placeholder=""><br>
           <label>Diện tích</label>
          <input type="text" class="form-control" name="dientich" placeholder=""><br>
          <label>Diện tích nền</label>
          <input type="text" class="form-control" name="dientichnen" placeholder=""><br>
           <label>Số tầng</label>
          <input type="text" class="form-control" name="sotang" placeholder=""><br>
           <label>Số phòng ngủ</label>
          <input type="text" class="form-control" name="pngu" placeholder=""><br>
           <label>Số phòng tắm</label>
          <input type="text" class="form-control" name="ptam" placeholder=""><br>
          <label>Giá</label>
          <input type="text" class="form-control" name="gia" placeholder=""><br>
              <label>Chọn đơn vị giao dịch</label>
           <?php 
            $sql_donvi = mysqli_query($con, 'SELECT  * FROM donvi ORDER BY madonvi ASC');
        ?>
           <select name="madonvi" class="form-control">
            <option value="">-----------Đơn vị---------------</option>
            <?php while($row_donvi = mysqli_fetch_array($sql_donvi)){ ?>
            <option value="<?php echo $row_donvi['madonvi']?>"><?php echo $row_donvi['tendonvi']?></option>
            <?php
          }
            ?>
           </select>
           <?php
           ?>

          <label>Mô tả</label>
          <textarea class="form-control" name="mota"></textarea><br>
        

       
          <input type="submit" name="themtin2" value="Thêm tin" class="btn btn-default">
        </form>
        </div>
        <?php
      }
        ?>

      
      
        
      <div style="margin-left:200px" class="col-md-8">
        <h4 >Tin đã đăng</h4>
        <?php
        $sql_select_tin = mysqli_query($con,"SELECT * FROM tinbds,giaodich, thanhvien WHERE tinbds.magiaodich=giaodich.magiaodich and tinbds.iduser=thanhvien.iduser ORDER BY tinbds.mabds DESC"); 
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
            <th>Loại giao dịch</th>
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
            <td><img src="uploads/<?php echo $row_tin['hinhanh'] ?>" height="100" width="80"></td>
            <td><?php echo $row_tin['mattp'] ?></td>
            <td><?php echo $row_tin['quanhuyen'] ?></td>
             <td><?php echo $row_tin['phuong'] ?></td>
              <td><?php echo $row_tin['duong'] ?></td>
               <td><?php echo $row_tin['dientich'] ?></td>
                <td><?php echo $row_tin['gia'] ?></td>
                 <td><?php echo $row_tin['ngaydangtin'] ?></td>
                  <td><?php echo $row_tin['loaigiaodich'] ?></td>
            <td><a href="?quanly=dangtinnha&xoa=<?php echo $row_tin['mabds'] ?>">Xóa</a> || <a href="?quanly=dangtinnha&quanly2=capnhat&capnhat_id=<?php echo $row_tin['mabds'] ?>">Cập nhật</a></td>
          </tr>
        <?php
          } 
          ?> 
        </table>
      </div>
    </div>
  </div>

