
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
    $iduser = $_SESSION['iduser'];
    $mattp = $_POST['mattp'];
       $donvi = $_POST['madonvi'];
    $quanhuyen = $_POST['quanhuyen'];
    $phuong = $_POST['phuong'];
    $duong = $_POST['duong'];
    $dientich = $_POST['dientich'];
    $loaidat = $_POST['loaidat'];
    $gia = $_POST['gia'];
    $magiaodich = $_POST['magiaodich'];
    $mota = $_POST['mota'];
    $path = 'uploads/';
    if($tieude =='' || $mattp == '' || $quanhuyen =='' || $phuong=='' || $duong=='' || $dientich=='' || $gia=='' || $mota ==''){
      echo "<script>alert('Xin nhập đủ thông tin!!!')</script>";
    }else{
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_tinbsd = mysqli_query($con,"INSERT INTO tinbds(tieude,mattp,quanhuyen,phuong,duong,mota,hinhanh,magiaodich,iduser,loaidat,madonvi,gia,dientich) values ('$tieude','$mattp','$quanhuyen','$phuong','$duong','$mota','$hinhanh','$magiaodich', '$iduser','$loaidat','$donvi', '$gia', '$dientich')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    echo "<script>alert('Đăng thành công!!!')</script>";
  }
}
?> 
<?php
  if(isset($_GET['xoa'])){
    $id= $_GET['xoa'];
    $sql_xoa = mysqli_query($con,"DELETE FROM tinbds WHERE mabds='$id'");
  } 
?>


  
        <div style="margin-left:400px"class="col-md-4">
        <h2 style="color:red" class="heading-tittle text-center font-italic" >Thêm tin bất động sản</h2>
        
        <form action="" method="POST" enctype="multipart/form-data">
                     <label>Loại giao dịch</label>
             <?php 
            $sql_loaigiaodich = mysqli_query($con, 'SELECT  * FROM giaodich WHERE (magiaodich=3 or magiaodich = 4) ORDER BY magiaodich ASC');
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
          <label>Phường - Khu vực</label>
          <input type="text" class="form-control" name="phuong" placeholder=""><br>
           <label>Địa chỉ chi tết</label>
          <input type="text" class="form-control" name="duong" placeholder=""><br>
           <label>Diện tích</label>
          <input type="text" class="form-control" name="dientich" placeholder=""><br>
          <label>Loại đất</label>
          <input type="text" class="form-control" name="loaidat" placeholder=""><br>
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
            <td><a href="?quanly=dangtindat&xoa=<?php echo $row_tin['mabds'] ?>">Xóa</a> || <a href="xulytin.php?quanly=capnhat&capnhat_id=<?php echo $row_tin['mabds'] ?>">Cập nhật</a></td>
          </tr>
        <?php
          } 
          ?> 
        </table>
      </div>
    </div>
  </div>
  