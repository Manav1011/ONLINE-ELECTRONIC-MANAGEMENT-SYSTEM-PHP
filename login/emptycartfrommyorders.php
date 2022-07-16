<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cartid=$_GET['cartid'];
$orderid=$_GET['orderid'];
$cid=$_GET['cid'];
$select="SELECT `PRODUCT_ID`,`QUANTITY` FROM `cart_archive_master` WHERE `CART_ID`='$cartid'";
    $query=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($query)){
        $pid=$row['PRODUCT_ID'];
        $cartquantity=$row['QUANTITY'];
        $pselect="SELECT `QUANTITY` FROM `product_master` WHERE `PRODUCT_ID`='$pid'";
        $pquery=mysqli_query($con,$pselect);
        while($row1=mysqli_fetch_array($pquery)){
            $pquantity=$row1['QUANTITY'];
            $newquantity=$pquantity+$cartquantity;
            $update="UPDATE `product_master` SET `QUANTITY`='$newquantity' WHERE `PRODUCT_ID`='$pid'";
            $udatequery=mysqli_query($con,$update);
        }
    }
    if($udatequery){
        header("location:myorders.php?cid=$cid");
    }
?>