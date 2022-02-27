<?php
  include('../db/connect.php');
?>

<?php
  if(isset($_POST['themtin'])){
    $tieude = $_POST['tieude'];
    $hinhanh = $_FILES['hinhanh']['name'];
    
    $mattp = $_POST['mattp'];
    $quanhuyen = $_POST['quanhuyen'];
    $phuong = $_POST['phuong'];
    $duong = $_POST['duong'];
    $dientich = $_POST['dientich'];
    $gia = $_POST['gia'];
    $magiaodich = $_POST['magiaodich'];
    $mota = $_POST['mota'];
    $path = '../uploads/';
    
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $sql_insert_tinbsd = mysqli_query($con,"INSERT INTO tinbds(tieude,mattp,quanhuyen,phuong,duong,mota,hinhanh,magiaodich,gia, dientich) values ('$tieude','$mattp','$quanhuyen','$phuong','$duong','$mota','$hinhanh','$magiaodich','$gia' ,'$dientich')");
    move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
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
    }else{
      move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
    $sql_update_image = "UPDATE tinbds SET tieude='$tieude',mattp='$mattp',quanhuyen='$quanhuyen',phuong='$phuong',duong='$duong',dientich='$dientich',gia='$gia',mota='$mota',magiaodich='$magiaodich',hinhanh='$hinhanh' magiaodich='$magiaodich' WHERE mabds=$id_up";
    }
    mysqli_query($con,$sql_update_image);
  }
  
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
    <?php
      if(isset($_GET['quanly'])=='capnhat'){
        $id_capnhat = $_GET['id'];
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
        <div class="col-md-4">
        <h4>Thêm tin bất động sản</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Tiêu đề tin</label>
          <input type="text" class="form-control" name="tieude" placeholder="Tiêu đề tin"><br>
          <label>Hình ảnh</label>
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
          <label>Giá</label>
          <input type="text" class="form-control" name="gia" placeholder=""><br>
          <label>Mô tả</label>
          <textarea class="form-control" name="mota"></textarea><br>
          <label>Danh mục</label>
          <?php
          $sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC"); 
          ?>
           <label>Loại giao dịch</label>
           <?php 
            $sql_loaigiaodich = mysqli_query($con, 'SELECT  * FROM giaodich ORDER BY magiaodich ASC');
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
          <input type="submit" name="themtin" value="Thêm tin" class="btn btn-default">
        </form>
        </div>
        <?php
      }
      
      
        ?>
      <div class="col-md-8">
        <h4>Liệt kê tin bất động sản</h4>
        <?php
        $sql_select_tin = mysqli_query($con,"SELECT * FROM tinbds,giaodich WHERE tinbds.magiaodich=giaodich.magiaodich ORDER BY tinbds.mabds DESC"); 
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
            <td><img src="../uploads/<?php echo $row_tin['hinhanh'] ?>" height="100" width="80"></td>
            <td><?php echo $row_tin['mattp'] ?></td>
            <td><?php echo $row_tin['quanhuyen'] ?></td>
             <td><?php echo $row_tin['phuong'] ?></td>
              <td><?php echo $row_tin['duong'] ?></td>
               <td><?php echo $row_tin['dientich'] ?></td>
                <td><?php echo $row_tin['gia'] ?></td>
                 <td><?php echo $row_tin['ngaydangtin'] ?></td>
                  <td><?php echo $row_tin['loaigiaodich'] ?></td>
            <td><a href="?xoa=<?php echo $row_tin['mabds'] ?>">Xóa</a> || <a href="xulytin.php?quanly=capnhat&id=<?php echo $row_tin['mabds'] ?>">Cập nhật</a></td>
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