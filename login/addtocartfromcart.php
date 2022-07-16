
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</head>
<body>
<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$pid=$_GET['pid'];
$cid=$_GET['cid'];
$pselect="SELECT `QUANTITY` FROM `product_master` WHERE `PRODUCT_ID`='$pid'";
$pquery=mysqli_query($con,$pselect);
while($prow=mysqli_fetch_array($pquery)){
    $pquantity=$prow['QUANTITY'];
}
if($pquantity==0){
    echo'<div class="alert alert-danger" role="alert" style="margin:auto;">
    Product is out of stock<a href="welcome.php?id='.$cid.'" style="text-decoration: underline;">Go Back!!</a>
  </div>';
}
else{
$insert="INSERT INTO `cart_master`(`CART_ID`, `CUSTOMER_ID`, `PRODUCT_ID`, `QUANTITY`) VALUES ('','$cid','$pid','1')";
$query=mysqli_query($con,$insert);
if($query){
    $pquantity--;
    $pupdate="UPDATE `product_master` SET `QUANTITY`='$pquantity' WHERE `PRODUCT_ID`='$pid'";
    $pquery=mysqli_query($con,$pupdate);
    echo'<script>
    window.history.back();
  </script>';
}
}
?>
</body>
</html>
