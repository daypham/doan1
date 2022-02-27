<?php 
session_start();
    include_once('db/connect.php')
?>  
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>

    </title>
    <meta charset="UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link href="css/Style1.css" rel="stylesheet" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <!-- font-->

</head>
<body>
   <?php
   include('includes/menu3.php');
   include('includes/logan.php');
   if(isset($_GET['quanly']))
   {
    $tam =$_GET['quanly'];
   }else{
    $tam = '';
   }
   if($tam=='danhmuc'){
    include('includes/danhsachtin.php');
   }else if($tam=='chitiettin'){
    include('includes/chitiettin.php');
   }elseif($tam=='dangtinnha') {
    include('includes/dangtinnha.php');
}elseif($tam=='dangtindat') {
    include('includes/dangtindat.php');
}elseif($tam=='dangtinmua') {
    include('includes/dangtinmua.php');
 }elseif($tam=='quanlytaikhoan') {
    include('includes/quanlytaikhoan.php');
 }
 elseif($tam=='quanlytaitin') {
    include('includes/quanlytin.php');
 }
   else
   {
    include('includes/home2.php');
   }
   
   include('includes/footer.php');

   ?>
  

   


 <script src="js/jquery-2.2.3.min.js"></script>

  <!-- for bootstrap working -->
  <script src="js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
</body>
</html>
