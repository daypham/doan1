	
<?php
  if(isset($_POST['gui'])){ 
  	$hoten = $_POST['hoten']; 
  	$email = $_POST['email']; 
  	$noidung = $_POST['noidung']; 
  $sql_insert_tinbsd = mysqli_query($con,"INSERT INTO phanhoi(hoten, email, noidung) values ('$hoten','$email','$noidung')"); echo "<script>alert('Gửi thành công!!!')</script>";
  }
   
  
?> 



        <div style="margin-left:600px" class="col-md-4">
        <h4>Liên hệ với chúng tôi</h4>
        
        <form action="" method="POST" enctype="multipart/form-data">
          <label>Họ tên</label>
          <input type="text" class="form-control" name="hoten" placeholder="Họ tên"><br>
          <label>Email</label>
         <input type="text" class="form-control" name="email" placeholder="Email"><br>
          <label>Nội dung</label>
            <textarea class="form-control" rows="10" name="noidung"></textarea><br>
          <input type="submit" name="gui" value="Gửi phản " class="btn btn-default">
        </form>
        </div>
       
      
 