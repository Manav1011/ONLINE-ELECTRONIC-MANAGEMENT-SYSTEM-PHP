<?php
include('C:\xampp\htdocs\ONLINE ELECTRONIC MANAGEMENT SYSTEM\dbconnect.php');
$cid=$_GET['cid'];
$cmpid=$_GET['cmpid'];
$delete="DELETE FROM `compare_master` WHERE `COMPARE_ID`='$cmpid' AND `CUSTOMER_ID`='$cid'";
$query=mysqli_query($con,$delete);
if($query){
    echo '<script> window.history.back();</script>';
}
?>