<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$quantity=$_GET['quantity'];
$cartid=$_GET['cartid'];
$cid=$_GET['cid'];
$pid=$_GET['pid'];
$date=$_GET['date'];
$pselect="SELECT `QUANTITY` FROM `product_master` WHERE `PRODUCT_ID`='$pid'";
$pquery=mysqli_query($con,$pselect);
while($prow=mysqli_fetch_array($pquery)){
    $pquantity=$prow['QUANTITY'];
}
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$insert="DELETE FROM `cart_master` WHERE `CART_ID`='$cartid'";
$query=mysqli_query($con,$insert);
if($query){
    $insert1="INSERT INTO `cart_archive_master`(`CART_ID`, `PRODUCT_ID`, `CUSTOMER_ID`, `QUANTITY`, `DATE`) VALUES ('$cartid','$pid','$cid','$quantity','$date')";
    $query1=mysqli_query($con,$insert1);
    if($query1){
    $pquantity++;
    $pupdate="UPDATE `product_master` SET `QUANTITY`='$pquantity' WHERE `PRODUCT_ID`='$pid'";
    $pquery=mysqli_query($con,$pupdate);
    header("location:cart.php?cid=$cid");
    }
}
?>