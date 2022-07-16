<?php
session_start();
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cid=$_GET['cid'];
$select="SELECT `PRODUCT_ID`, `QUANTITY` FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";
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
$delete="DELETE FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";
$sselect="SELECT * FROM `cart_master` WHERE `CUSTOMER_ID`='$cid'";
    $squery=mysqli_query($con,$sselect);
    while($srow=mysqli_fetch_array($squery)){
        $cartid1=$srow['CART_ID'];
        $pid1=$srow['PRODUCT_ID'];
        $quantity1=$srow['QUANTITY'];
        $date=$srow['DATE'];
    $insert1="INSERT INTO `cart_archive_master`(`CART_ID`, `PRODUCT_ID`, `CUSTOMER_ID`, `QUANTITY`, `DATE`) VALUES ('$cartid1','$pid1','$cid','$quantity1',current_timestamp())";
    $query1=mysqli_query($con,$insert1);
$query=mysqli_query($con,$delete);
if($query){
    header("location:welcome.php?id=$cid");
    }
    
}
?>