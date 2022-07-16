<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
  header("location:login.php");
  exit;
}
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cid=$_GET['cid'];
$total=$_GET['total'];
$cartid=$_GET['cartid'];
$quantity=$_GET['quantity1'];
$insert="INSERT INTO `order_master`(`ORDER_ID`, `CUSTOMER_ID`, `SHOPKEEPER_ID`, `CART_ID`, `QUANTITY`, `TOTAL`,`DATE`) VALUES ('','$cid','1','$cartid','$quantity','$total',current_timestamp())";
$oquery=mysqli_query($con,$insert);
if($oquery){
 $select="SELECT * FROM `order_master` WHERE `CUSTOMER_ID`='$cid'";
  $query=mysqli_query($con,$select);
   while($row=mysqli_fetch_array($query)){
   $orderid=$row['ORDER_ID'];
header("location:payment.php?cid=$cid&total=$total&orderid=$orderid");
   }
}
?>