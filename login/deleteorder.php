<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cartid=$_GET['cartid'];
$date=$_GET['date'];
$cid= $_GET['cid'];
$quantity=$_GET['quantity'];
$orderid=$_GET['orderid'];
$total=$_GET['total'];
$delete="DELETE FROM `order_master` WHERE `ORDER_ID`='$orderid' AND `CUSTOMER_ID`='$cid'";
$insert="INSERT INTO `order_archive_master`(`ORDER_ID`, `CART_ID`, `CUSTOMER_ID`, `SHOPKEEPER_ID`, `QUANTITY`, `TOTAL`, `DATE`) VALUES ('$orderid','$cartid','$cid','1','$quantity','$total','$date')";
$insertq=mysqli_query($con,$insert);
$qdelete=mysqli_query($con,$delete);
if($insertq){
    header("location:emptycartfrommyorders.php?cid=$cid&orderid=$orderid&cartid=$cartid");
}
?>